//
//  MenuViewController.h
//  Artyot001
//
//  Created by invoice on 1/16/13.
//  Copyright (c) 2013 invoice. All rights reserved.
//

#import <UIKit/UIKit.h>

@interface MenuViewController : UIViewController
@property (strong, nonatomic) IBOutlet UITextView *tvInfo;
- (IBAction)buttonOrdering:(id)sender;
- (IBAction)buttonShipping:(id)sender;
- (IBAction)buttonPrivacy:(id)sender;
- (IBAction)buttonCancelation:(id)sender;

@property (strong, nonatomic) IBOutlet UIButton *buttonOrdering;
@property (strong, nonatomic) IBOutlet UIButton *buttonShipping;
@property (strong, nonatomic) IBOutlet UIButton *buttonPrivacy;
@property (strong, nonatomic) IBOutlet UIButton *buttonCancelation;

@end
