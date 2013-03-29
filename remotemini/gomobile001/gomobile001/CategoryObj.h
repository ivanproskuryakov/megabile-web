//
//  CategoryObj.h
//  Artyot001
//
//  Created by invoice on 1/12/13.
//  Copyright (c) 2013 invoice. All rights reserved.
//

#import <Foundation/Foundation.h>

@interface CategoryObj : NSObject {


@private
    NSString *categoryId;
    NSString *parentId;
    NSString *name;
//    NSMutableArray *productIds;
}

@property (nonatomic,copy) NSString *categoryId;
@property (nonatomic,copy) NSString *parentId;
@property (nonatomic,copy) NSString *name;
//@property (nonatomic, strong) NSMutableArray *productIds;


@end