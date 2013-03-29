//
//  ApplicationData.h
//  Artyot001
//
//  Created by invoice on 1/13/13.
//  Copyright (c) 2013 invoice. All rights reserved.
//

#import <Foundation/Foundation.h>
#import "CategoryObj.h"
#import "ProductObj.h"

@interface ApplicationData : NSObject

+(void) parseXml;



//#pragma mark - ORDER EMAIL
//+(NSString*) getOrderEmailAddress;


#pragma mark - API
+(void) setApiValues:(NSString*) url:(NSString*) userId;
+(NSString*) getApi:(NSString*) id;
    
#pragma mark - TRANSLATE
+(NSString*) getTranslation:(NSString*) id;

#pragma mark - COMPANY
+(NSString*) getCompanyInfo:(NSString*) id;

#pragma mark - MAIL
+(NSString*) getMailInfo:(NSString*) id;

#pragma mark - CATEGORY
+(int) getCategoryCount:(NSString*) categoryId;
+(NSMutableArray*) getCategoriesForParentId:(NSString*) parentId;
+(void) setCurrentProductsForCategoryId:(NSString*) categoryId;
+(NSString*) getCurrentProductsCategoryId;


#pragma mark - PRODUCT
+(int) getProductCount:(NSString*) categoryId;
+(NSMutableArray*) getCurrentProducts;


#pragma mark - CART
+(void) decCartProduct:(int) productId;
+(void) incCartProduct:(int) productId;
+(NSMutableArray*) getCartProducts;
+(NSString*) getCartCount;
+(NSString*) getCartTotal;
+(void) addToCart:(ProductObj*) product;
+(void) clearCart;


#pragma mark - CURRENCY
+(NSString*) getCurrency;

#pragma mark - SEARCH
+(void) setCurrentProductsForSearch:(NSString*) searchText;
+(NSMutableArray*) getCurrentSearchProducts;
+(void) clearCurrentSearchProducts;

@end
