//
//  ProductCell.h
//  Artyot001
//
//  Created by invoice on 1/14/13.
//  Copyright (c) 2013 invoice. All rights reserved.
//

#import <Foundation/Foundation.h>

@interface ProductCell : NSObject

@property (strong, nonatomic) IBOutlet UITableViewCell *productCell;

@property (strong, nonatomic) IBOutlet UITextView *productName;
@property (strong, nonatomic) IBOutlet UILabel *productPrice;

@property (strong, nonatomic) IBOutlet UIImageView *imageProductPicrure;


@end
