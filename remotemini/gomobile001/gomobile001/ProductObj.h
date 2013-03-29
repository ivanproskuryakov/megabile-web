//
//  ProductObj.h
//  Artyot001
//
//  Created by invoice on 1/13/13.
//  Copyright (c) 2013 invoice. All rights reserved.
//

#import <Foundation/Foundation.h>

@interface ProductObj : NSObject {
    
    
@private
    NSString *productId;
//    NSString *categoryId;
    NSString *name;
    NSString *price;
    NSString *picture;
    NSString *description;
    
    NSString *cartQty;
    //NSString *imageURL;
    NSMutableArray *categoryIds;
}

@property (nonatomic, strong) NSMutableArray *categoryIds;
@property (nonatomic,copy) NSString *productId;
//@property (nonatomic,copy) NSString *categoryId;
@property (nonatomic,copy) NSString *name;
@property (nonatomic,copy) NSString *price;
@property (nonatomic,copy) NSString *picture;
@property (nonatomic,copy) NSString *description;
@property (nonatomic,copy) NSString *cartQty;


@end