//
//  XmlProcessing.m
//  Artyot001
//
//  Created by invoice on 1/12/13.
//  Copyright (c) 2013 invoice. All rights reserved.
//

#import "XmlProcessing.h"
#import "CategoryObj.h"
#import "ProductObj.h"
#import "NSString+HTML.h"

static NSString *CATEGORY_TAG           = @"category";
static NSString *OFFER_TAG              = @"offer";

static NSString *PRICE_TAG              = @"price";
static NSString *PRODUCTCATEGORY_TAG    = @"categoryId";
static NSString *PRODUCTCATEGORYID_TAG  = @"cid";
static NSString *NAME_TAG               = @"name";
static NSString *PICTURE_TAG            = @"picture";
static NSString *DESCRIPTION_TAG        = @"description";

static NSString *COMPANYSETTINGS_TAG    = @"companysettings";
static NSString *MAILSETTINGS_TAG       = @"mailsettings";
static NSString *TRANSLATE_TAG          = @"translate";

static NSString *ORDER_EMAIL_TAG        = @"order_mail";



@implementation XmlProcessing


@synthesize currentNode;
@synthesize mainCategoryXmlArray;
@synthesize mainProductXmlArray;
@synthesize companysettings;
@synthesize mailsettings;
@synthesize orderEmailAddress;
@synthesize translate;
@synthesize tempstring;
@synthesize isExit;

-(id) init {
    self = [super init];
    if (!self) return nil;
    self.currentNode = [[NSMutableString alloc] init];
    self.tempstring = [[NSMutableString alloc] init];
    self.mainCategoryXmlArray = [[NSMutableArray alloc] init];
    self.mainProductXmlArray = [[NSMutableArray alloc] init];
    self.translate =[[NSMutableDictionary alloc] init];
    self.companysettings =[[NSMutableDictionary alloc] init];
    self.mailsettings =[[NSMutableDictionary alloc] init];
    return self;
    
}




#pragma mark - XML

- (void) startXmlProcessing {

    
    // XML FILE
    NSArray   *paths = NSSearchPathForDirectoriesInDomains(NSDocumentDirectory, NSUserDomainMask, YES);
    NSString  *documentsDirectory = [paths objectAtIndex:0];
    NSString  *fileXmlPath = [NSString stringWithFormat:@"%@/%@", documentsDirectory,@"store_catalog.xml"];    
    
    
    if(!fileXmlPath){
        NSLog(@"No path for resource Catalog XML !");
    }
    NSData *parseData = [NSData dataWithContentsOfFile:fileXmlPath];
    if(!parseData){
        NSLog(@"No data for path Catalog XML");
    }
    
    NSXMLParser *parser = [[NSXMLParser alloc]initWithData:parseData];
    [parser setShouldProcessNamespaces:YES];
    [parser setShouldReportNamespacePrefixes:YES];
    [parser setShouldResolveExternalEntities:YES];
    
    [parser setDelegate:self];
    
    @try
    {
        if (![parser parse])
        {
            NSLog (@"Catalog XML parsing finished with error");
        }
    }
    @catch (NSException *e)
    {
        NSLog (@"Exception '%@' while parsing Catalog XML", [e reason]);
    }
    @finally
    {
        NSLog(@"End XML parsing");
    }
    
    
}

-(void)parser:(NSXMLParser *)parser foundCharacters:(NSString *)string
{
    BOOL existsFlag = NO;
    
    
    // ORDER EMAIL PROCESSING
    if ([self.currentNode isEqualToString:ORDER_EMAIL_TAG] ) {
        self.orderEmailAddress = string;
    }
    
    if ([self.currentNode isEqualToString:CATEGORY_TAG] ) {
        CategoryObj *tempCategory = [self.mainCategoryXmlArray lastObject];
        tempCategory.name = string;
    }
    
    if ([self.currentNode isEqualToString:PRICE_TAG] ) {
        ProductObj *tempProduct = [self.mainProductXmlArray lastObject];
        tempProduct.price = string;
    }
    if ([self.currentNode isEqualToString:NAME_TAG] ) {
        ProductObj *tempProduct = [self.mainProductXmlArray lastObject];
        tempProduct.name = string;
    }
    if ([self.currentNode isEqualToString:PRODUCTCATEGORYID_TAG] ) {
        ProductObj *tempProduct = [self.mainProductXmlArray lastObject];
        
        for (int i =0; i < [tempProduct.categoryIds count]; i++) {
            if ([[tempProduct.categoryIds objectAtIndex:i] isEqualToString:string]) {
                existsFlag = YES;
            }
        }
        if (existsFlag == NO) {
            [tempProduct.categoryIds addObject:string];            
        }
    }
    if ([self.currentNode isEqualToString:PICTURE_TAG] ) {
        ProductObj *tempProduct = [self.mainProductXmlArray lastObject];
        tempProduct.picture = string;
    }
    if ([self.currentNode isEqualToString:DESCRIPTION_TAG] ) {
        [self.tempstring appendString:string];
    }
    
    
}

-(void)parser:(NSXMLParser *)parser didStartElement:(NSString *)elementName namespaceURI:(NSString *)namespaceURI qualifiedName:(NSString *)qName attributes:(NSDictionary *)attributeDict
{

//    NSLog(@"<%@>",elementName);
    self.tempstring = [NSMutableString stringWithString:@""];
    
    // CATEGORIES
    if ([elementName isEqualToString:CATEGORY_TAG]) {
        NSString *categoryId = [attributeDict objectForKey:@"id"];
        NSString *parentId = [attributeDict objectForKey:@"parentId"];
        
            
        CategoryObj *categoryNode = [[CategoryObj alloc] init];
        categoryNode.name = @" __BLANK__ ";
        categoryNode.parentId = parentId;
        categoryNode.categoryId = categoryId;
        
        
        [self.mainCategoryXmlArray addObject:(categoryNode)];

    }
    
    // PRODUCTS 
    if ([elementName isEqualToString:OFFER_TAG]) {
        NSString *productId = [attributeDict objectForKey:@"id"];
            
        ProductObj *productNode = [[ProductObj alloc] init];
        productNode.productId = productId;
        
        [self.mainProductXmlArray addObject:(productNode)];        
        
        //NSLog (@" Product: #%@ ", productId);
        
    }
    
    // COMPANY SETTINGS 
    if ([elementName isEqualToString:COMPANYSETTINGS_TAG]) {
        [self.companysettings setObject:[attributeDict objectForKey:@"value" ] forKey:[attributeDict objectForKey:@"id"]];
    }
    
    // MAIL SETTINGS 
    if ([elementName isEqualToString:MAILSETTINGS_TAG]) {
        [self.mailsettings setObject:[attributeDict objectForKey:@"value" ] forKey:[attributeDict objectForKey:@"id"]];
    }
    
    // TRANSLATE 
    if ([elementName isEqualToString:TRANSLATE_TAG]) {
        [self.translate setObject:[attributeDict objectForKey:@"text" ] forKey:[attributeDict objectForKey:@"id"]];
    }
    
    
    self.currentNode = [elementName copy];
    
}

- (void)parser:(NSXMLParser *)parser didEndElement:(NSString *)elementName namespaceURI:(NSString *)namespaceURI qualifiedName:(NSString *)qName
{
    
    if ([elementName isEqualToString:DESCRIPTION_TAG] ) {
        ProductObj *tempProduct = [self.mainProductXmlArray lastObject];
        tempProduct.description = self.tempstring;
    }
    


    self.currentNode = nil;
}


@end
