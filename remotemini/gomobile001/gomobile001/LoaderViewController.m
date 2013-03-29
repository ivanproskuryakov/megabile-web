//
//  LoaderViewController.m
//  gomobile001
//
//  Created by invoice on 2/26/13.
//  Copyright (c) 2013 magazento.com. All rights reserved.
//

#import "LoaderViewController.h"
#import "ApplicationData.h"
#import "UIImage+iPhone5.h"
//#import <QuartzCore/QuartzCore.h>
#import "ViewController.h"
#import "ApplicationData.h"
#import "CartViewController.h"
#import "MenuViewController.h"
#import "SearchViewController.h"
#import "ZipArchive.h"
#import "SBJSON.h"

static NSString *USER_TAG          = @"userid";
static NSString *API_TAG           = @"api";
static NSString *CRYPT_PASSWORD    = @"magazento.mobile.password";

@interface LoaderViewController ()

@end

@implementation LoaderViewController

@synthesize apiAddress;
@synthesize userId;
@synthesize currentNode;
@synthesize fileData;
@synthesize fileSize;
@synthesize apiProducts;
- (id)initWithNibName:(NSString *)nibNameOrNil bundle:(NSBundle *)nibBundleOrNil
{
    self = [super initWithNibName:nibNameOrNil bundle:nibBundleOrNil];
    if (self) {
        // Custom initialization
    }
    return self;
}


#pragma mark - MAIN 

- (void)viewDidLoad
{
    UIColor* bgColor = [UIColor colorWithPatternImage:[UIImage tallImageNamed:@"Default.png"]];
    [self.view setBackgroundColor:bgColor];
    
    self.currentNode = [[NSMutableString alloc] init];
    self.fileData = [NSMutableData data];
    self.progressLoader.progress = 0.0;
    self.labelNow.text  = @"0.0 Mb";
    self.labelTotal.text = @"0.0 Mb";
    [self.labelNow setHidden:YES];
    [self.labelTotal setHidden:YES];
    [self.progressLoader setHidden:YES];
    
    [super viewDidLoad];
    [self.navigationController setNavigationBarHidden:YES animated:NO];
}


- (void) viewDidAppear:(BOOL)animated {
    NSLog(@"===== LOADER =====");
    
    [self processXML];
    [self checkAPIandDownloadCatalog];

}

- (void) startProgramm {
    
    [ApplicationData parseXml];
    [ApplicationData setApiValues:self.apiAddress :self.userId];
    
    // LOAD TABBAR
    UIViewController * vcSearch = [[SearchViewController alloc] initWithNibName:@"SearchViewController" bundle:nil];
    UIViewController * vcCart = [[CartViewController alloc] initWithNibName:@"CartViewController" bundle:nil];
    UIViewController * vcMenu = [[MenuViewController alloc] initWithNibName:@"MenuViewController" bundle:nil];
    
    ViewController * vcCatalog = [[ViewController alloc] initWithNibName:@"ViewController" bundle:nil];
    vcCatalog.currentCategory.parentId = @"0"; // SET PARENT = ROOT CATEGORY
    vcCatalog.currentCategory.name = [ApplicationData getTranslation:@"Catalog"]; // SET NAME = ROOT CATEGORY
    
    UITabBarController *uTabBar = [[UITabBarController alloc] init];
    UINavigationController *ncCatalog = [[UINavigationController alloc] initWithRootViewController:vcCatalog];
    UINavigationController *ncSearch = [[UINavigationController alloc] initWithRootViewController:vcSearch];
    UINavigationController *ncCart = [[UINavigationController alloc] initWithRootViewController:vcCart];
    UINavigationController *ncMenu = [[UINavigationController alloc] initWithRootViewController:vcMenu];
    
    ncCart.navigationBar.tintColor =
    ncSearch.navigationBar.tintColor =
    ncCatalog.navigationBar.tintColor =
    ncMenu.navigationBar.tintColor = [UIColor colorWithRed:42/255.0f green:42/255.0f blue:42/255.0f alpha:1];
    
    uTabBar.viewControllers = @[ncSearch,ncCatalog, ncCart, ncMenu];
    
    [[UIApplication sharedApplication] setStatusBarHidden:NO withAnimation:NO];
    [self.navigationController pushViewController: uTabBar animated:NO];
}


- (void)didReceiveMemoryWarning
{
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}


#pragma mark - CHECK, CONNECT AND DOWNLOAD ====================================================================

-(void) checkAPIandDownloadCatalog
{
    
    // GET SETTINGS FROM API
    NSString *storeinfoURL = [NSString stringWithFormat:@"%@/storeinfo/%@/",self.apiAddress,self.userId] ;
    NSLog(@"API URL: %@",storeinfoURL);    
    NSError *error = nil;
    NSString *responseString= [NSString stringWithContentsOfURL:[NSURL URLWithString:storeinfoURL] encoding:NSUTF8StringEncoding error:&error];
    NSDictionary *jsonDict = [responseString JSONValue];    
    int updateDate = [[jsonDict objectForKey:@"updatedate"] intValue];
    self.apiProducts = [[jsonDict objectForKey:@"products"] intValue];
    NSLog(@"DATE FROM API. PRODUCTS: %i UDATEDATE: %i",self.apiProducts,updateDate);
    
    // CHECK FOR AN ERROR AND SHOW ERROR IF EXISTS
    NSString *errorAPI = [jsonDict objectForKey:@"error"];
    NSLog(@"ERROR FROM API: %@",errorAPI);

    if ([errorAPI length] > 0) {
        UIAlertView *alert = [[UIAlertView alloc]
                              initWithTitle:errorAPI
                              message:nil
                              delegate:self
                              cancelButtonTitle:nil
                              otherButtonTitles:@"OK", nil];
        [alert show];
    } else {
        
        // CHECK SERVER IS DOWN
        if (updateDate == 0) {
            
            if ([self getSaveDate] > 0) {
                [self startProgramm];
            } else {
                UIAlertView *alert = [[UIAlertView alloc]
                                      initWithTitle:@"Connection Problem :("
                                      message:nil
                                      delegate:self
                                      cancelButtonTitle:nil
                                      otherButtonTitles:@"OK", nil];
                [alert show];
            }
        }
        
        // SERVER UPTIME
        if (updateDate > 0) {
            if ( [self isDatesEquals:updateDate] == NO ) {
                [self saveUpdateDate:updateDate];
                
                // CATALOG
                NSString *storecatalogURL = [NSString stringWithFormat:@"%@/storecatalog/%@/",self.apiAddress,self.userId];
                NSURL *fileURL = [NSURL URLWithString:storecatalogURL];
                NSURLRequest *req = [NSURLRequest requestWithURL:fileURL];
                [NSURLConnection connectionWithRequest:req delegate:self];
                
            } else {
                
                // START PROGRAMM
                [self startProgramm];
            }
            
        }
    }
    
}

- (void)connection:(NSURLConnection *)connection didReceiveData:(NSData *)data {
      
    [self.fileData appendData:data];
    float position = [self.fileData length] / [self.fileSize floatValue];
    self.progressLoader.progress = position;
    
    float mbNow = [self.fileData length];
    mbNow = mbNow / 1024 / 1024;
    self.labelNow.text = [NSString stringWithFormat:@"%.2f Mb",mbNow];

//    NSLog(@" didReceiveData %f.2 %.2f Mb",position,mbNow );
}

- (void)connection:(NSURLConnection *)connection didReceiveResponse:(NSURLResponse *)response
{

    [self.labelNow setHidden:NO];
    [self.labelTotal setHidden:NO];
    [self.progressLoader setHidden:NO];
    self.fileSize = [NSNumber numberWithLongLong:[response expectedContentLength]];
    float totalMb = [self.fileSize floatValue] / 1024 / 1024;
    self.labelTotal.text = [NSString stringWithFormat:@"%.2f Mb",totalMb];
    
    NSLog(@" didReceiveResponse %.2f Mb",totalMb);
}

- (void)connectionDidFinishLoading:(NSURLConnection *)connection {

    [self.labelNow setHidden:YES];
    [self.labelTotal setHidden:YES];
    
    
    // WRITE FILE
    NSArray   *paths = NSSearchPathForDirectoriesInDomains(NSDocumentDirectory, NSUserDomainMask, YES);
    NSString  *documentsDirectory = [paths objectAtIndex:0];
    NSString  *zipPath = [NSString stringWithFormat:@"%@/%@", documentsDirectory,@"store_catalog.zip"];
    BOOL result = [self.fileData writeToFile:zipPath atomically:YES];

    

    // UNZIP FILE
    ZipArchive *zipArchive = [[ZipArchive alloc] init];
    [zipArchive UnzipOpenFile:zipPath Password:CRYPT_PASSWORD];
    [zipArchive UnzipFileTo:documentsDirectory overWrite:YES];
    [zipArchive UnzipCloseFile];

    
    // START PROGRAMM
    [self startProgramm];


}

- (void)connection:(NSURLConnection *)connection didFailWithError:(NSError *)error {
   NSLog(@" didFailWithError");
}

-(void) alertView:(UIAlertView *)alertView clickedButtonAtIndex:(NSInteger)buttonIndex{
    
    if (buttonIndex == 0) {
        exit(0);
    }
}


#pragma mark - XML




- (void) processXML {
    
    NSString *fileXmlPath = [[NSBundle mainBundle] pathForResource:@"info" ofType:@"xml"];
    
    if(!fileXmlPath){
        NSLog(@"No path for resources!");
    }
    NSData *parseData = [NSData dataWithContentsOfFile:fileXmlPath];
    if(!parseData){
        NSLog(@"No data for path");
    }

    NSString *encryptedStr = [NSString stringWithUTF8String:[parseData bytes]];
    encryptedStr = [self AFBase64EncodedStringFromString:encryptedStr];
    encryptedStr = [encryptedStr substringFromIndex:1];
    encryptedStr = [self AFBase64EncodedStringFromString:encryptedStr];
    encryptedStr = [encryptedStr substringFromIndex:1];
    encryptedStr = [self AFBase64EncodedStringFromString:encryptedStr];
    encryptedStr = [encryptedStr substringFromIndex:1];
    encryptedStr = [self AFBase64EncodedStringFromString:encryptedStr];
    encryptedStr = [encryptedStr substringFromIndex:1];
    encryptedStr = [self AFBase64EncodedStringFromString:encryptedStr];
    encryptedStr = [encryptedStr substringFromIndex:1];
    
    
    parseData = [encryptedStr dataUsingEncoding:NSUTF8StringEncoding];
    
    NSXMLParser *parser = [[NSXMLParser alloc]initWithData:parseData];
    
    [parser setDelegate:self];
    
    @try
    {
        if (![parser parse])
        {
            NSLog (@"Xml parsing finished with error");
        }
    }
    @catch (NSException *e)
    {
        NSLog (@"Exception '%@' while parsing Xml", [e reason]);
    }
    @finally
    {
        NSLog(@"End Xml parsing");
    }
    
}

-(void)parser:(NSXMLParser *)parser foundCharacters:(NSString *)string
{
    if ([self.currentNode isEqualToString:USER_TAG] ) {
        self.userId = string;
        NSLog(@"UserID: %@",string);
    }
    if ([self.currentNode isEqualToString:API_TAG] ) {
        self.apiAddress = string;
        NSLog(@"apiAddress: %@",string);
    }
}

#pragma mark - DATES  

-(int)getSaveDate {
    
    int savedDate;
    if (![[NSUserDefaults standardUserDefaults] integerForKey:@"updatedate"]) {
        savedDate = 0;
    } else {
        savedDate = [[NSUserDefaults standardUserDefaults] integerForKey:@"updatedate"];
    }
    return savedDate;
}

-(BOOL)isDatesEquals:(int) date {

    int savedDate;
    if (![[NSUserDefaults standardUserDefaults] integerForKey:@"updatedate"]) {
        savedDate = 0;
    } else {
        savedDate = [[NSUserDefaults standardUserDefaults] integerForKey:@"updatedate"];
    }
    
    NSLog(@" savedDate:%i date:%i",savedDate,date);
    BOOL result = NO;
    if (savedDate == date) result = YES;
    
    return result;

}

-(void)saveUpdateDate:(int) date {
    NSLog(@" New savedDate:%i",date);
    [[NSUserDefaults standardUserDefaults] setInteger:date forKey:@"updatedate"];

}

-(void)parser:(NSXMLParser *)parser didStartElement:(NSString *)elementName namespaceURI:(NSString *)namespaceURI qualifiedName:(NSString *)qName attributes:(NSDictionary *)attributeDict
{
    self.currentNode = [elementName copy];
}



- (void)parser:(NSXMLParser *)parser didEndElement:(NSString *)elementName namespaceURI:(NSString *)namespaceURI qualifiedName:(NSString *)qName
{
    self.currentNode = nil;
}

#pragma mark - BASE64 

- (NSString *) AFBase64EncodedStringFromString :(NSString *) string {
    
    unsigned long ixtext, lentext;
    unsigned char ch, inbuf[4], outbuf[3];
    short i, ixinbuf;
    Boolean flignore, flendtext = false;
    const unsigned char *tempcstring;
    NSMutableData *theData;
    
    if (string == nil)
    {
        return [NSData data];
    }
    
    ixtext = 0;
    
    tempcstring = (const unsigned char *)[string UTF8String];
    
    lentext = [string length];
    
    theData = [NSMutableData dataWithCapacity: lentext];
    
    ixinbuf = 0;
    
    while (true)
    {
        if (ixtext >= lentext)
        {
            break;
        }
        
        ch = tempcstring [ixtext++];
        
        flignore = false;
        
        if ((ch >= 'A') && (ch <= 'Z'))
        {
            ch = ch - 'A';
        }
        else if ((ch >= 'a') && (ch <= 'z'))
        {
            ch = ch - 'a' + 26;
        }
        else if ((ch >= '0') && (ch <= '9'))
        {
            ch = ch - '0' + 52;
        }
        else if (ch == '+')
        {
            ch = 62;
        }
        else if (ch == '=')
        {
            flendtext = true;
        }
        else if (ch == '/')
        {
            ch = 63;
        }
        else
        {
            flignore = true;
        }
        
        if (!flignore)
        {
            short ctcharsinbuf = 3;
            Boolean flbreak = false;
            
            if (flendtext)
            {
                if (ixinbuf == 0)
                {
                    break;
                }
                
                if ((ixinbuf == 1) || (ixinbuf == 2))
                {
                    ctcharsinbuf = 1;
                }
                else
                {
                    ctcharsinbuf = 2;
                }
                
                ixinbuf = 3;
                
                flbreak = true;
            }
            
            inbuf [ixinbuf++] = ch;
            
            if (ixinbuf == 4)
            {
                ixinbuf = 0;
                
                outbuf[0] = (inbuf[0] << 2) | ((inbuf[1] & 0x30) >> 4);
                outbuf[1] = ((inbuf[1] & 0x0F) << 4) | ((inbuf[2] & 0x3C) >> 2);
                outbuf[2] = ((inbuf[2] & 0x03) << 6) | (inbuf[3] & 0x3F);
                
                for (i = 0; i < ctcharsinbuf; i++)
                {
                    [theData appendBytes: &outbuf[i] length: 1];
                }
            }
            
            if (flbreak)
            {
                break;
            }
        }
    }
    return [[NSString alloc] initWithData:theData encoding:NSASCIIStringEncoding];
}

- (void)viewDidUnload {
    [self setProgressLoader:nil];
    [self setLabelTotal:nil];
    [self setLabelNow:nil];
    [super viewDidUnload];
}

@end
