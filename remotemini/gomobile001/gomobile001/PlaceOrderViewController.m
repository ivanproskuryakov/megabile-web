//
//  PlaceOrderViewController.m
//  GoMobile
//
//  Created by invoice on 1/18/13.
//  Copyright (c) 2013 invoice. All rights reserved.
//

#import "PlaceOrderViewController.h"
#import "ApplicationData.h"
#import "CartViewController.h"
#import "AppDelegate.h"
#import "UIImage+iPhone5.h"
#import <QuartzCore/QuartzCore.h>



CGFloat animatedDistance;

static const CGFloat KEYBOARD_ANIMATION_DURATION = 0.3;
static const CGFloat MINIMUM_SCROLL_FRACTION = 0.2;
static const CGFloat MAXIMUM_SCROLL_FRACTION = 0.8;
static const CGFloat PORTRAIT_KEYBOARD_HEIGHT = 216;
static const CGFloat LANDSCAPE_KEYBOARD_HEIGHT = 162;

@interface PlaceOrderViewController ()

@end

@implementation PlaceOrderViewController

@synthesize responseData;

- (void)textFieldDidBeginEditing:(UITextField *)textField
{
    
    CGRect textFieldRect = [self.view.window convertRect:textField.bounds fromView:textField];
    CGRect viewRect = [self.view.window convertRect:self.view.bounds fromView:self.view];
    CGFloat midline = textFieldRect.origin.y + 0.5 * textFieldRect.size.height;
    CGFloat numerator = midline - viewRect.origin.y - MINIMUM_SCROLL_FRACTION * viewRect.size.height;
    CGFloat denominator = (MAXIMUM_SCROLL_FRACTION - MINIMUM_SCROLL_FRACTION) * viewRect.size.height;
    CGFloat heightFraction = numerator / denominator;
    if (heightFraction < 0.0)
    {
        heightFraction = 0.0;
    }
    else if (heightFraction > 1.0)
    {
        heightFraction = 1.0;
    }
    UIInterfaceOrientation orientation = [[UIApplication sharedApplication] statusBarOrientation];
    
    if (orientation == UIInterfaceOrientationPortrait ||
        orientation == UIInterfaceOrientationPortraitUpsideDown)
    {
        animatedDistance = floor(PORTRAIT_KEYBOARD_HEIGHT * heightFraction);
    }
    else
    {
        animatedDistance = floor(LANDSCAPE_KEYBOARD_HEIGHT * heightFraction);
    }
    CGRect viewFrame = self.view.frame;
    viewFrame.origin.y -= animatedDistance;
    
    [UIView beginAnimations:nil context:NULL];
    [UIView setAnimationBeginsFromCurrentState:YES];
    [UIView setAnimationDuration:KEYBOARD_ANIMATION_DURATION];
    
    [self.view setFrame:viewFrame];
    
    [UIView commitAnimations];
}

- (void)textFieldDidEndEditing:(UITextField *)textField
{
    CGRect viewFrame = self.view.frame;
    viewFrame.origin.y += animatedDistance;
    
    [UIView beginAnimations:nil context:NULL];
    [UIView setAnimationBeginsFromCurrentState:YES];
    [UIView setAnimationDuration:KEYBOARD_ANIMATION_DURATION];
    
    [self.view setFrame:viewFrame];
    
    [UIView commitAnimations];
}


- (BOOL)textFieldShouldReturn:(UITextField *)textField
{
    [textField resignFirstResponder];
    return YES;
}


- (id)initWithNibName:(NSString *)nibNameOrNil bundle:(NSBundle *)nibBundleOrNil
{
    self = [super initWithNibName:nibNameOrNil bundle:nibBundleOrNil];
    if (self) {

    }
    return self;
}

- (void)viewDidLoad
{
    [super viewDidLoad];
    self.orderLabel.text = [ApplicationData getTranslation:@"Please, enter your contact information"];
    self.labelFirstName.text = [ApplicationData getTranslation:@"First name"];
    self.labelLastName.text = [ApplicationData getTranslation:@"Last name"];
    self.labelPhone.text = [ApplicationData getTranslation:@"Phone number"];
    self.labelEmail.text = [ApplicationData getTranslation:@"E-mail"];
    self.labelComment.text = [ApplicationData getTranslation:@"Comment"];
    [self.buttonPlaceOrder setTitle:[ApplicationData getTranslation:@"Send Order"] forState:UIControlStateNormal];
    [self.buttonPlaceOrder setTitle:[ApplicationData getTranslation:@"Send Order"] forState:UIControlStateHighlighted];

    
    self.orderFirstName.delegate = self;
    self.orderLastName.delegate = self;
    self.orderEmail.delegate = self;
    self.orderPhone.delegate = self;
    self.orderComment.delegate = self;
    
    UIColor* bgColor = [UIColor colorWithPatternImage:[UIImage tallImageNamed:@"bg.png"]];
    [self.view setBackgroundColor:bgColor];
    
//    UIColor* bgColor = [UIColor blackColor];
//    [self.view setBackgroundColor:bgColor];
    
}

- (void)didReceiveMemoryWarning
{
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}


- (void)viewDidUnload {
    [self setOrderFirstName:nil];
    [self setOrderLastName:nil];
    [self setOrderPhone:nil];
    [self setOrderEmail:nil];
    [self setOrderComment:nil];
    [self setOrderLabel:nil];
    [self setButtonPlaceOrder:nil];
    [self setLabelFirstName:nil];
    [self setLabelLastName:nil];
    [self setLabelPhone:nil];
    [self setLabelEmail:nil];
    [self setLabelComment:nil];
    [super viewDidUnload];
}
- (IBAction)submitOrderAction:(id)sender {
    
    BOOL approved = YES;

    if ([self.orderFirstName.text isEqualToString:@""]) {
        self.orderLabel.text = [ApplicationData getTranslation:@"First name field is empty"];
        approved = NO;
    }
    if ([self.orderLastName.text isEqualToString:@""]) {
        self.orderLabel.text = [ApplicationData getTranslation:@"Last name field is empty"];
        approved = NO;
    }
    if ([self.orderEmail.text isEqualToString:@""]) {
        self.orderLabel.text = [ApplicationData getTranslation:@"E-mail field is empty"];
        approved = NO;
    }
    if ([self.orderPhone.text isEqualToString:@""]) {
        self.orderLabel.text = [ApplicationData getTranslation:@"Phone field is empty"];
        approved = NO;
    }
    
    
    if (approved) {
//        [(AppDelegate *)[[UIApplication sharedApplication] delegate] setNetworkActivityIndicatorVisible:YES];
//        NSLog(@"buttonPlaceOrder");
        
        NSString *txtTo      = [ApplicationData getCompanyInfo:@"email"];
        NSString *txtName    = [NSString stringWithFormat:@"%@ %@",self.orderFirstName.text,self.orderLastName.text];
        NSString *txtSubject = [ApplicationData getTranslation:@"New order"];
        NSString *txtBody    = @"";
        NSString *txtEmailFrom    = self.orderEmail.text;
        NSString *txtComment = self.orderComment.text;
        NSString *txtPhone   = self.orderPhone.text;
        
        
        NSMutableArray *cartProducts = [ApplicationData getCartProducts];
        for (int i = 0; i < [cartProducts count] ; i++  ) {
            ProductObj *productObject = [cartProducts objectAtIndex:i];
            txtBody=[txtBody stringByAppendingString:[NSString stringWithFormat:@"#%@ #%@ #%@ item(s) \n" , productObject.productId,productObject.name,productObject.cartQty]];            
        }
        
        txtBody=[txtBody stringByAppendingString:[NSString stringWithFormat:@"%@:%@ %@:%@ \n" ,@"Grand Total",@"Count", [ApplicationData getCartTotal],[ApplicationData getCartCount]]];
        txtBody=[txtBody stringByAppendingString:@"------------\n"];        
        txtBody=[txtBody stringByAppendingString:[NSString stringWithFormat:@"Name: %@ \n" , txtName]];
        txtBody=[txtBody stringByAppendingString:[NSString stringWithFormat:@"E-mail: %@ \n" , txtEmailFrom]];
        txtBody=[txtBody stringByAppendingString:[NSString stringWithFormat:@"Phone: %@ \n" , txtPhone]];
        txtBody=[txtBody stringByAppendingString:[NSString stringWithFormat:@"Comment: %@ \n" , txtComment]];
  
  
        NSString *body = @"";
        body=[body stringByAppendingString:@"email_to="];
        body=[body stringByAppendingString:txtTo];
        
        body=[body stringByAppendingString:@"&"];
        body=[body stringByAppendingString:@"subject="];
        body=[body stringByAppendingString:txtSubject];
        
        body=[body stringByAppendingString:@"&"];
        body=[body stringByAppendingString:@"message="];
        body=[body stringByAppendingString:txtBody];
        
        
        
        // SEND REQUEST TO API
         [(AppDelegate *)[[UIApplication sharedApplication] delegate] setNetworkActivityIndicatorVisible:YES];
        NSString *apiURL = [NSString stringWithFormat:@"%@/orderemail/%@",[ApplicationData getApi:@"url"],[ApplicationData getApi:@"userId"]];
        NSLog(apiURL);
        NSURL *url = [NSURL URLWithString:apiURL];
        
        NSMutableURLRequest *request = [NSMutableURLRequest requestWithURL:url
                                                               cachePolicy:NSURLRequestUseProtocolCachePolicy
                                                           timeoutInterval:10.0];
        [request setHTTPMethod:@"POST"];
        NSData *data=[body dataUsingEncoding:NSUTF8StringEncoding];
        [request setHTTPBody:data];
        
        [[NSURLConnection alloc] initWithRequest:request delegate:self];
        
    }
    
}
-   (void)connection:(NSURLConnection *)connection didReceiveData:(NSData *)theData{
    
    NSString *response = [[NSString alloc] initWithData:theData encoding:NSUTF8StringEncoding];
    
    if ([response isEqualToString:@"200"]) {
        UIAlertView *alert = [[UIAlertView alloc]
                              initWithTitle:[ApplicationData getTranslation:@"Thank you! Your order has been sent"]
                              message:nil
                              delegate:self
                              cancelButtonTitle:nil
                              otherButtonTitles:[ApplicationData getTranslation:@"OK"], nil];
        [alert show];
    }
    
}



- (void)connection:(NSURLConnection *)connection didFailWithError:(NSError *)error {
    UIAlertView *alert = [[UIAlertView alloc]
                          initWithTitle:[ApplicationData getTranslation:@"Connection error. Unable send your order :("]
                          message:nil
                          delegate:nil
                          cancelButtonTitle:nil
                          otherButtonTitles:[ApplicationData getTranslation:@"Close"], nil];
    [alert show];
}

- (void)alertView:(UIAlertView *)alertView didDismissWithButtonIndex:(NSInteger)buttonIndex;{
    if (buttonIndex == 0)
    {
        [(AppDelegate *)[[UIApplication sharedApplication] delegate] setNetworkActivityIndicatorVisible:NO];
        
        CartViewController *uvcCart = [[CartViewController alloc] initWithNibName:@"CartViewController" bundle:nil];
        [self.navigationController pushViewController: uvcCart animated:YES];
    }
}


@end
