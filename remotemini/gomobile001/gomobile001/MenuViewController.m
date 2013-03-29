//
//  MenuViewController.m
//  Artyot001
//
//  Created by invoice on 1/16/13.
//  Copyright (c) 2013 invoice. All rights reserved.
//

#import "MenuViewController.h"
#import "UIImage+iPhone5.h"
#import <QuartzCore/QuartzCore.h>
#import "ApplicationData.h"
#import "ViewControllerOrdering.h"
#import "ViewControllerShipping.h"
#import "ViewControllerPrivacy.h"
#import "ViewControllerCancelation.h"

@interface MenuViewController ()

@end

@implementation MenuViewController

- (id)initWithNibName:(NSString *)nibNameOrNil bundle:(NSBundle *)nibBundleOrNil
{
    self = [super initWithNibName:nibNameOrNil bundle:nibBundleOrNil];
    if (self) {
        self.title =  [ApplicationData getTranslation:@"Menu"];
        UIImage* icon = [UIImage imageNamed:@"tab-icon4"];
        [self.tabBarItem setFinishedSelectedImage:icon withFinishedUnselectedImage:icon];
    }
    return self;
}

- (void)viewDidLoad
{
    [super viewDidLoad];
    UIColor* bgColor = [UIColor colorWithPatternImage:[UIImage tallImageNamed:@"bg.png"]];
    [self.view setBackgroundColor:bgColor];
    
    self.tvInfo.text =[NSString stringWithFormat:@"%@ \n%@ \n%@ \n%@ \n%@ \n%@ \n%@ \n%@",
                       [ApplicationData getCompanyInfo:@"website"],                       
                       [ApplicationData getCompanyInfo:@"name"],
                       [ApplicationData getCompanyInfo:@"address_line"],
                       [ApplicationData getCompanyInfo:@"region"],
                       [ApplicationData getCompanyInfo:@"city"],
                       [ApplicationData getCompanyInfo:@"zip"],
                       [ApplicationData getCompanyInfo:@"email"],
                       [ApplicationData getCompanyInfo:@"phone"]
                       ];
    
    [self.buttonOrdering setTitle:[ApplicationData getTranslation:@"Ordering"] forState:UIControlStateHighlighted];
    [self.buttonShipping setTitle:[ApplicationData getTranslation:@"Shipping"] forState:UIControlStateHighlighted];
    [self.buttonPrivacy setTitle:[ApplicationData getTranslation:@"Privacy"] forState:UIControlStateHighlighted];
    [self.buttonCancelation setTitle:[ApplicationData getTranslation:@"Cancellation"] forState:UIControlStateHighlighted];
    
    [self.buttonOrdering setTitle:[ApplicationData getTranslation:@"Ordering"] forState:UIControlStateNormal];
    [self.buttonShipping setTitle:[ApplicationData getTranslation:@"Shipping"] forState:UIControlStateNormal];
    [self.buttonPrivacy setTitle:[ApplicationData getTranslation:@"Privacy"] forState:UIControlStateNormal];
    [self.buttonCancelation setTitle:[ApplicationData getTranslation:@"Cancellation"] forState:UIControlStateNormal];
    
//    self.buttonOrdering.titleLabel.text = [ApplicationData getTranslation:@"Ordering"];
//    self.buttonShipping.titleLabel.text = [ApplicationData getTranslation:@"Shipping"];
//    self.buttonPrivacy.titleLabel.text  = [ApplicationData getTranslation:@"Privacy"];
//    self.buttonCancelation.titleLabel.text = [ApplicationData getTranslation:@"Cancellation"];
    
//    self.tvTerm.text =[NSString stringWithFormat:@"%@ \n%@ \n%@ \n%@",
//                       [ApplicationData getCompanyInfo:@"ordering"],
//                       [ApplicationData getCompanyInfo:@"shipping"],
//                       [ApplicationData getCompanyInfo:@"privacy"],
//                       [ApplicationData getCompanyInfo:@"cancellation"]
//                       ];
    
    CALayer* shadowLayer = [self createShadowWithFrame:CGRectMake(0, 0, 320, 5)];
    [self.view.layer addSublayer:shadowLayer];

}


-(CALayer *)createShadowWithFrame:(CGRect)frame {
    CAGradientLayer *gradient = [CAGradientLayer layer];
    gradient.frame = frame;
    
    
    UIColor* lightColor = [[UIColor blackColor] colorWithAlphaComponent:0.0];
    UIColor* darkColor = [[UIColor blackColor] colorWithAlphaComponent:0.3];
    
    gradient.colors = @[(id)darkColor.CGColor, (id)lightColor.CGColor];
    
    return gradient;
}


- (void)didReceiveMemoryWarning
{
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}

- (void)viewDidUnload {
    [self setTvInfo:nil];
    [self setButtonOrdering:nil];
    [self setButtonShipping:nil];
    [self setButtonPrivacy:nil];
    [self setButtonCancelation:nil];
    [super viewDidUnload];
}
- (IBAction)buttonOrdering:(id)sender {
    ViewControllerOrdering *vcOrdering = [[ViewControllerOrdering alloc] initWithNibName:@"ViewControllerOrdering" bundle:nil];
    [self.navigationController pushViewController: vcOrdering animated:YES];
}

- (IBAction)buttonShipping:(id)sender {
    ViewControllerShipping *vcShipping = [[ViewControllerShipping alloc] initWithNibName:@"ViewControllerShipping" bundle:nil];    
    [self.navigationController pushViewController: vcShipping animated:YES];
}

- (IBAction)buttonPrivacy:(id)sender {
    ViewControllerPrivacy *vcPrivacy = [[ViewControllerPrivacy alloc] initWithNibName:@"ViewControllerPrivacy" bundle:nil];
    [self.navigationController pushViewController: vcPrivacy animated:YES];
}

- (IBAction)buttonCancelation:(id)sender {
    ViewControllerCancelation *vcCancelation = [[ViewControllerCancelation alloc] initWithNibName:@"ViewControllerCancelation" bundle:nil];
    [self.navigationController pushViewController: vcCancelation animated:YES];
}
@end
