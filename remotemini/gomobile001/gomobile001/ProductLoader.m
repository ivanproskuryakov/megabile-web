//
//  ProductLoader.m
//  Artyot001
//
//  Created by invoice on 1/16/13.
//  Copyright (c) 2013 invoice. All rights reserved.
//

#import "ProductLoader.h"
#import "ApplicationData.h"
@implementation ProductLoader

-(id) init
{
    self = [super init];
    
    if (!self)
        return nil;
    
    NSBundle *mainBundle= [NSBundle mainBundle];
    [mainBundle loadNibNamed:@"ProductLoaderView" owner:self options:nil];
    self.labelLoader.text = [ApplicationData getTranslation:@"Loading ..."];
    
    NSLog(@"loader init");
    return self;
}


@end
