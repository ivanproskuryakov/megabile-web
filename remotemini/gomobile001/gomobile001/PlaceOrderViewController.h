//
//  PlaceOrderViewController.h
//  GoMobile
//
//  Created by invoice on 1/18/13.
//  Copyright (c) 2013 invoice. All rights reserved.
//

#import <UIKit/UIKit.h>

@interface PlaceOrderViewController : UIViewController <UITextFieldDelegate,UITextViewDelegate>
@property (strong, nonatomic) IBOutlet UITextField *orderFirstName;
@property (strong, nonatomic) IBOutlet UITextField *orderLastName;
@property (strong, nonatomic) IBOutlet UITextField *orderPhone;
@property (strong, nonatomic) IBOutlet UITextField *orderEmail;
@property (strong, nonatomic) IBOutlet UITextField *orderComment;

@property (strong, nonatomic) IBOutlet UITextView *orderLabel;
@property (strong, nonatomic) IBOutlet UIButton *buttonPlaceOrder;


@property (strong, nonatomic) NSMutableData *responseData;
@property (strong, nonatomic) IBOutlet UILabel *labelFirstName;
@property (strong, nonatomic) IBOutlet UILabel *labelLastName;
@property (strong, nonatomic) IBOutlet UILabel *labelPhone;
@property (strong, nonatomic) IBOutlet UILabel *labelEmail;
@property (strong, nonatomic) IBOutlet UILabel *labelComment;


- (IBAction)submitOrderAction:(id)sender;
- (void)textBeginEditing:(UIControl *)textField;
- (void)textEndEditing:(UIControl *)textField;

@end
