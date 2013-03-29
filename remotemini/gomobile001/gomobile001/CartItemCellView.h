//
//  CartItemCellView.h
//  Artyot001
//
//  Created by invoice on 1/15/13.
//  Copyright (c) 2013 invoice. All rights reserved.
//

#import <Foundation/Foundation.h>

@interface CartItemCellView : NSObject


@property (strong, nonatomic) IBOutlet UITextView *productName;

@property (strong, nonatomic) IBOutlet UILabel *productPrice;
@property (strong, nonatomic) IBOutlet UILabel *productQty;
@property (strong, nonatomic) IBOutlet UITableViewCell *cartItemCell;
@property (strong, nonatomic) IBOutlet UIImageView *imageProductPicture;

- (IBAction)decProduct:(id)sender;
- (IBAction)incProduct:(id)sender;

@property (strong, nonatomic) IBOutlet UIButton *buttonIncProduct;
@property (strong, nonatomic) IBOutlet UIButton *buttonDecProduct;


@end
