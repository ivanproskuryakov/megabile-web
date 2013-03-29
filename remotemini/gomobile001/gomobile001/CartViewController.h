//
//  CartViewController.h
//  Artyot001
//
//  Created by invoice on 1/15/13.
//  Copyright (c) 2013 invoice. All rights reserved.
//

#import <UIKit/UIKit.h>
#import "CartItemCellView.h"

@interface CartViewController : UIViewController


//@property (strong, nonatomic) IBOutlet UITableView *cartTableView;
@property (strong, nonatomic) NSMutableArray *cartItemCellsArray;
@property (strong, nonatomic) IBOutlet UITableView *cartTableView;
@property (strong, nonatomic) IBOutlet UIView *viewTotal;



@property (strong, nonatomic) IBOutlet UILabel *labelItemsCount;
@property (strong, nonatomic) IBOutlet UILabel *labelItemsTotalSum;
- (IBAction)buttonClear:(id)sender;
- (IBAction)buttonPlaceOrder:(id)sender;

- (void)updateCartPage;
- (void)placeOrder;
- (void)clearCart;

@property (strong, nonatomic) IBOutlet UINavigationBar *navigatioBarCart;

@end
