//
//  CartItemCellView.m
//  Artyot001
//
//  Created by invoice on 1/15/13.
//  Copyright (c) 2013 invoice. All rights reserved.
//

#import "CartItemCellView.h"
#import "ApplicationData.h"
#import "CartViewController.h"

@implementation CartItemCellView


-(id) init
{
    self = [super init];
    
    if (!self)
        return nil;
    
    NSBundle *mainBundle= [NSBundle mainBundle];
    [mainBundle loadNibNamed:@"CartItemCellView" owner:self options:nil];
    
    return self;
}

- (IBAction)decProduct:(id)sender {
    [[NSNotificationCenter defaultCenter] postNotificationName:@"decProduct" object:sender];
}

- (IBAction)incProduct:(id)sender {
    [[NSNotificationCenter defaultCenter] postNotificationName:@"incProduct" object:sender];

}

@end
