//
//  ViewControllerCancelation.m
//  gomobile001
//
//  Created by invoice on 3/3/13.
//  Copyright (c) 2013 magazento.com. All rights reserved.
//

#import "ViewControllerCancelation.h"
#import "ApplicationData.h"

@interface ViewControllerCancelation ()

@end

@implementation ViewControllerCancelation

- (id)initWithNibName:(NSString *)nibNameOrNil bundle:(NSBundle *)nibBundleOrNil
{
    self = [super initWithNibName:nibNameOrNil bundle:nibBundleOrNil];
    if (self) {
        // Custom initialization
    }
    return self;
}

- (void)viewDidLoad
{
    [super viewDidLoad];
    self.tvText.text = [ApplicationData getCompanyInfo:@"cancellation"];    
    // Do any additional setup after loading the view from its nib.
}

- (void)didReceiveMemoryWarning
{
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}

- (void)viewDidUnload {
    [self setTvText:nil];
    [super viewDidUnload];
}
@end
