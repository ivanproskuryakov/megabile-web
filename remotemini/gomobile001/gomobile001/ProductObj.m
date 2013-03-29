//
//  ProductObj.m
//  Artyot001
//
//  Created by invoice on 1/13/13.
//  Copyright (c) 2013 invoice. All rights reserved.
//

#import "ProductObj.h"

@implementation ProductObj


@synthesize productId;
@synthesize categoryIds;
@synthesize name;
@synthesize price;
@synthesize picture;
@synthesize description;
@synthesize cartQty;



-(id) init {
    self = [super init];
    if (!self) return nil;
    self.categoryIds= [[NSMutableArray alloc] init];
    return self;
}


@end;