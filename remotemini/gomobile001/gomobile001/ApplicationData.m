//
//  ApplicationData.m
//  Artyot001
//
//  Created by invoice on 1/13/13.
//  Copyright (c) 2013 invoice. All rights reserved.
//

#import "ApplicationData.h"
#import "XmlProcessing.h"
#import "CategoryObj.h"
#import "ProductObj.h"


@interface ApplicationDataInternal : NSObject {

@private
    NSMutableArray *categoryArray;
    NSMutableArray *productArray;
    
    NSMutableArray *currentProductArray;
    NSString       *currentProductCategoryId;

    NSMutableArray *cartProductArray;
    NSString       *currency;
    
    NSMutableArray *searchProductsArray;
    NSString       *searchText;
    
    NSMutableDictionary *translate;
    NSMutableDictionary *company;
    NSMutableDictionary *mail;
    NSString       *orderEmailAddress;
    
    NSMutableDictionary *api;
}

@property (nonatomic, retain) NSMutableArray *categoryArray;
@property (nonatomic, retain) NSMutableArray *productArray;
@property (nonatomic, retain) NSMutableArray *currentProductArray;
@property (nonatomic, strong) NSString       *currentProductCategoryId;
@property (nonatomic, retain) NSMutableArray *cartProductArray;
@property (nonatomic, strong) NSString       *currency;

@property (nonatomic, strong) NSMutableArray *searchProductsArray;
@property (nonatomic, strong) NSString       *searchText;

@property (nonatomic, strong) NSMutableDictionary *translate;
@property (nonatomic, strong) NSMutableDictionary *company;
@property (nonatomic, strong) NSMutableDictionary *mail;
@property (nonatomic, strong) NSMutableDictionary *api;
//@property (nonatomic, strong) NSString       *orderEmailAddress;
//@property (nonatomic, strong) NSString       *currentCategoryId;



@end

@implementation ApplicationDataInternal

@synthesize categoryArray;
@synthesize productArray;

@synthesize currentProductArray;
@synthesize currentProductCategoryId;
@synthesize cartProductArray;
@synthesize currency;

@synthesize searchProductsArray;
@synthesize searchText;

@synthesize translate;
@synthesize company;
@synthesize mail;
@synthesize api;
//@synthesize orderEmailAddress;
@end

static ApplicationDataInternal *sharedApplicationData = nil;


@implementation ApplicationData

#pragma mark - INIT
+(ApplicationDataInternal*) getInternal
{
    @synchronized(self)
    {
        if (!sharedApplicationData) {
            sharedApplicationData = [[ApplicationDataInternal alloc] init];
        }
    }
    return sharedApplicationData;
}

+ (void) parseXml {
    XmlProcessing *xmlParser = [[XmlProcessing alloc] init];
    [xmlParser startXmlProcessing];
    
    [self getInternal].cartProductArray     = [[NSMutableArray alloc] init];
    [self getInternal].currentProductArray  = [[NSMutableArray alloc] init];
    [self getInternal].categoryArray        = xmlParser.mainCategoryXmlArray;
    [self getInternal].productArray         = xmlParser.mainProductXmlArray;
    [self getInternal].currency             = [xmlParser.companysettings objectForKey:@"currency"];
    
    [self getInternal].searchProductsArray  = [[NSMutableArray alloc] init];
    [self getInternal].searchText           = @"";
    
    [self getInternal].translate            = xmlParser.translate;
    [self getInternal].company              = xmlParser.companysettings;
    [self getInternal].mail                 = xmlParser.mailsettings;
    [self getInternal].api                  = [[NSMutableDictionary alloc] init];
//    [self getInternal].orderEmailAddress    = xmlParser.orderEmailAddress;
    
    NSLog (@" Category count : %i ", [[self getInternal].categoryArray count]);
    NSLog (@" Product count : %i ", [[self getInternal].productArray count]);

}


//#pragma mark - ORDER EMAIL
//+(NSString*) getOrderEmailAddress{
//    return [self getInternal].orderEmailAddress;
//}

#pragma mark - API 
+(void) setApiValues:(NSString*) url:(NSString*) userId {
    [[self getInternal].api setObject:url forKey:@"url"];
    [[self getInternal].api setObject:userId forKey:@"userId"];
}

+(NSString*) getApi:(NSString*) id{
    NSString *string = [[self getInternal].api objectForKey:id];
    return string;
}

#pragma mark - COMPANY
+(NSString*) getCompanyInfo:(NSString*) id{
    NSString *string = [[self getInternal].company objectForKey:id];
    return string;
}

#pragma mark - MAIL
+(NSString*) getMailInfo:(NSString*) id{
    NSString *string = [[self getInternal].mail objectForKey:id];
    return string;
}

#pragma mark - TRANSLATE
+(NSString*) getTranslation:(NSString*) id{
    
    NSString *translation = [[self getInternal].translate objectForKey:id];
    if ([translation isEqualToString:@""]) translation = id;
    if (translation == NULL) translation = id;

    return translation;
}


#pragma mark - CURRENCY
+(NSString*) getCurrency {
    return [self getInternal].currency;
}

#pragma mark - CART
+(NSMutableArray*) getCartProducts {
    return [self getInternal].cartProductArray;
}

+(void) incCartProduct:(int) productId{
    NSMutableArray *cartProductsArray = [self getInternal].cartProductArray;
    int qty;
    for (int i=0; i < [cartProductsArray count]; i++) {
        ProductObj *productObject = [cartProductsArray objectAtIndex:i];
        if ([productObject.productId intValue]== productId) {
            qty = [productObject.cartQty intValue] + 1;
            productObject.cartQty = [NSString stringWithFormat:@"%i",qty];
        }
    }
}

+(void) decCartProduct:(int) productId{
    NSMutableArray *cartProductsArray = [self getInternal].cartProductArray;
    int qty;
    for (int i=0; i < [cartProductsArray count]; i++) {
        ProductObj *productObject = [cartProductsArray objectAtIndex:i];
        if ([productObject.productId intValue]== productId) {
            
            if ([productObject.cartQty intValue] <= 1 ) {
                qty = 0;
                productObject.cartQty = [NSString stringWithFormat:@"%i",qty];
                [cartProductsArray removeObjectAtIndex:i];
            } else {
                qty = [productObject.cartQty intValue] -1;
                productObject.cartQty = [NSString stringWithFormat:@"%i",qty];
            }

            
            
            
            
        }
    }
}



+(void) addToCart:(ProductObj*) product {
    
    NSMutableArray *cartProductsArray = [self getInternal].cartProductArray;
    BOOL isProductExists = NO;
    int qty;
    for (int i=0; i < [cartProductsArray count]; i++) {
        ProductObj *productObject = [cartProductsArray objectAtIndex:i];
        if (productObject.productId == product.productId) {
            isProductExists = YES;
            qty = [productObject.cartQty intValue] + 1;
            productObject.cartQty = [NSString stringWithFormat:@"%i",qty];

        }
    }
    if (!isProductExists) {
        product.cartQty = @"1";
        [cartProductsArray addObject:product];
        
    }
    NSLog (@" Product: %@ #%@, Total:%i", product.cartQty, product.productId,[cartProductsArray count]);

}

+(void) clearCart {
    [self getInternal].cartProductArray     = [[NSMutableArray alloc] init];
}
    
+(NSString*) getCartCount {
    
    NSMutableArray *cartProductsArray = [self getInternal].cartProductArray;
    int qty = 0;
    for (int i = 0 ; i < [cartProductsArray count]; i++) {
        ProductObj *tempProduct = [cartProductsArray objectAtIndex:i];
        qty = qty + [tempProduct.cartQty intValue];       
        NSLog (@" Cart item qty : %@ ", tempProduct.cartQty);
    }
    NSLog (@" Cart count : %i ", [cartProductsArray count]);
    
   return [NSString stringWithFormat:@"%i",qty];
}

+(NSString*) getCartTotal {
    float total = 0 ;
    for (int i = 0 ; i < [[self getInternal].cartProductArray count]; i++) {
        ProductObj *tempProduct = [[self getInternal].cartProductArray objectAtIndex:i];
        total = total + ([tempProduct.price intValue] * [tempProduct.cartQty floatValue]);
    }
    
   return [NSString stringWithFormat:@"%.2f %@",total, [ApplicationData getCurrency] ];
}

#pragma mark - CATEGORIES
+(NSMutableArray*) getCategoriesForParentId:(NSString*) parentId {
    
    
    NSMutableArray * categoriesArray = [[NSMutableArray alloc] init];
    
    for (int i=0; i < [[self getInternal].categoryArray count]; i++) {
        
        CategoryObj *tempCategory = [[self getInternal].categoryArray objectAtIndex:i];
        
        if ( [tempCategory.parentId isEqualToString:parentId]) {
            [categoriesArray addObject:tempCategory];
        }
    }
    
    return categoriesArray;
}

+(int) getCategoryCount:(NSString*) categoryId {
    
    int counter = 0;
    for (int i=0; i < [[self getInternal].categoryArray count]; i++) {
        
        CategoryObj *tempCategory = [[self getInternal].categoryArray objectAtIndex:i];
        
        if ( [tempCategory.parentId isEqualToString:categoryId]) {
            counter++;
        }
    }
    
    
    return counter;
}




#pragma mark - PRODUCTS
+(void) setCurrentProductsForCategoryId:(NSString*) categoryId {
    
    
    NSMutableArray * productsArray = [[NSMutableArray alloc] init];
    
    for (int i=0; i < [[self getInternal].productArray count]; i++) {
        
        ProductObj *tempProduct = [[self getInternal].productArray objectAtIndex:i];

        for (int i =0; i < [tempProduct.categoryIds count]; i++) {
            if ([[tempProduct.categoryIds objectAtIndex:i] isEqualToString:categoryId]) {
                [productsArray addObject:tempProduct];
                
            }
        }

    }
    [self getInternal].currentProductArray = productsArray;
    [self getInternal].currentProductCategoryId = categoryId;    

}

+(NSMutableArray*) getCurrentProducts {
    return [self getInternal].currentProductArray;
}

+(int) getProductCount:(NSString*) categoryId {
    
    int counter = 0;
    for (int i=0; i < [[self getInternal].productArray count]; i++) {
        
        ProductObj *tempProduct = [[self getInternal].productArray objectAtIndex:i];
        
        
        for (int i =0; i < [tempProduct.categoryIds count]; i++) {
            if ([[tempProduct.categoryIds objectAtIndex:i] isEqualToString:categoryId]) {
                counter++;
            }
        }

    }

    return counter;
}

+(NSString*) getCurrentProductsCategoryId {
    return [self getInternal].currentProductCategoryId;
}

#pragma mark - SEARCH
+(void) setCurrentProductsForSearch:(NSString*) searchText {
    
    NSMutableArray * productsArray = [[NSMutableArray alloc] init];
    
    for (int i=0; i < [[self getInternal].productArray count]; i++) {
        
        ProductObj *tempProduct = [[self getInternal].productArray objectAtIndex:i];
        
        if ( [tempProduct.name rangeOfString:searchText].location != NSNotFound) {
            [productsArray addObject:tempProduct];
        }
    }
    [self getInternal].searchProductsArray = productsArray;
    [self getInternal].searchText = searchText;
    
    NSLog(@" SEARCH: '%@' %i",searchText,[productsArray count]);
    
}


+(NSMutableArray*) getCurrentSearchProducts {
    return [self getInternal].searchProductsArray;
}


+(void) clearCurrentSearchProducts {
    [self getInternal].searchProductsArray  = [[NSMutableArray alloc] init];
    [self getInternal].searchText           = @"";
}




@end
