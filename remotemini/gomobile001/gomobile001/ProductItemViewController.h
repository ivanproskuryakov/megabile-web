//
//  ProductItemViewController.h
//  Artyot001
//
//  Created by invoice on 1/15/13.
//  Copyright (c) 2013 invoice. All rights reserved.
//

#import <UIKit/UIKit.h>
#import "ProductObj.h"
#import "CategoryObj.h"

@interface ProductItemViewController : UIViewController


@property (strong, nonatomic) IBOutlet UIImageView *productImage;
@property (strong, nonatomic) IBOutlet UITextView *productName;
@property (strong, nonatomic) IBOutlet UILabel *productPrice;
@property (strong, nonatomic) IBOutlet UIButton *productAddToCartButton;

@property (strong, nonatomic) IBOutlet UITextView *productDescription;

@property (strong, nonatomic) ProductObj *currentProductObject;

- (IBAction)addToCart:(id)sender;



@end
