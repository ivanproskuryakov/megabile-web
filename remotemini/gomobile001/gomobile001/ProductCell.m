//
//  ProductCell.m
//  Artyot001
//
//  Created by invoice on 1/14/13.
//  Copyright (c) 2013 invoice. All rights reserved.
//

#import "ProductCell.h"

@implementation ProductCell


-(id) init
{
    self = [super init];
    
    if (!self)
        return nil;
    NSBundle *mainBundle= [NSBundle mainBundle];
    [mainBundle loadNibNamed:@"ProductCell" owner:self options:nil];
    return self;
}


@end
