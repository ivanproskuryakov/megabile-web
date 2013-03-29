//
//  ViewControllerShipping.m
//  gomobile001
//
//  Created by invoice on 3/3/13.
//  Copyright (c) 2013 magazento.com. All rights reserved.
//

#import "ViewControllerShipping.h"
#import "ApplicationData.h"

@interface ViewControllerShipping ()

@end

@implementation ViewControllerShipping

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
    self.tvText.text = [ApplicationData getCompanyInfo:@"shipping"];
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
