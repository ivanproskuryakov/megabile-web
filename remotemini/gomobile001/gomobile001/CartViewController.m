//
//  CartViewController.m
//  Artyot001
//
//  Created by invoice on 1/15/13.
//  Copyright (c) 2013 invoice. All rights reserved.
//

#import "CartViewController.h"
#import "ProductObj.h"
#import "ApplicationData.h"
#import "CartItemCellView.h"
#import "PlaceOrderViewController.h"
#import "UIImageView+WebCache.h"
#import "UIImage+iPhone5.h"
#import <QuartzCore/QuartzCore.h>

@interface CartViewController ()

@end

@implementation CartViewController

@synthesize cartItemCellsArray;



- (id)initWithNibName:(NSString *)nibNameOrNil bundle:(NSBundle *)nibBundleOrNil
{
    self = [super initWithNibName:nibNameOrNil bundle:nibBundleOrNil];
    if (self) {

        UIImage* icon = [UIImage imageNamed:@"tab-icon3"];
        [self.tabBarItem setFinishedSelectedImage:icon withFinishedUnselectedImage:icon];
        self.title = [ApplicationData getTranslation:@"My cart"];
        
        // Add an observer that will respond to decButton
        [[NSNotificationCenter defaultCenter] addObserver:self
                                                 selector:@selector(decrementCartProduct:)
                                                     name:@"decProduct" object:nil];
        
        // Add an observer that will respond to incButton 
        [[NSNotificationCenter defaultCenter] addObserver:self
                                                 selector:@selector(incrementCartProduct:)
                                                     name:@"incProduct" object:nil];
        
        UIBarButtonItem *clearCartButton = [[UIBarButtonItem alloc]
                                       initWithTitle:[ApplicationData getTranslation:@"Clear cart"]
                                       style:UIBarButtonItemStyleBordered
                                       target:self
                                       action:@selector(clearCart)];
        self.navigationItem.leftBarButtonItem = clearCartButton;
        UIBarButtonItem *placeOrderButton = [[UIBarButtonItem alloc]
                                             initWithTitle:[ApplicationData getTranslation:@"Place order"]
                                       style:UIBarButtonItemStyleBordered
                                       target:self
                                       action:@selector(placeOrder)];
        self.navigationItem.rightBarButtonItem = placeOrderButton;
        
    }
    return self;
}

- (void)viewDidLoad {
    [super viewDidLoad];
    self.navigatioBarCart.topItem.title =[ApplicationData getTranslation:@"My cart"];
    self.title = [ApplicationData getTranslation:@"My cart"];

    UIColor* bgColor = [UIColor colorWithPatternImage:[UIImage tallImageNamed:@"bg.png"]];
    [self.view setBackgroundColor:bgColor];
    UIColor* bgColor2 = [UIColor colorWithPatternImage:[UIImage tallImageNamed:@"bg-panel.png"]];
    self.viewTotal.backgroundColor = bgColor2;
    
    CALayer* shadowLayer = [self createShadowWithFrame:CGRectMake(0, 0, 320, 5)];
    [self.view.layer addSublayer:shadowLayer];
    
}


-(CALayer *)createShadowWithFrame:(CGRect)frame {
    CAGradientLayer *gradient = [CAGradientLayer layer];
    gradient.frame = frame;
    
    
    UIColor* lightColor = [[UIColor blackColor] colorWithAlphaComponent:0.0];
    UIColor* darkColor = [[UIColor blackColor] colorWithAlphaComponent:0.3];
    
    gradient.colors = @[(id)darkColor.CGColor, (id)lightColor.CGColor];
    
    return gradient;
}



- (void)updateCartPage {
    self.labelItemsCount.text = [NSString stringWithFormat:@"%@: %@",[ApplicationData getTranslation:@"Product count"],[ApplicationData getCartCount] ];
    self.labelItemsTotalSum.text = [NSString stringWithFormat:@"%@: %@",[ApplicationData getTranslation:@"Total sum"],[ApplicationData getCartTotal] ];
    [self loadTableCells];    
    [self.cartTableView reloadData];
}

- (void)clearCart {
    self.cartItemCellsArray = [[NSMutableArray alloc] init];    
    [ApplicationData clearCart];
    [self updateCartPage];

}

-(void) loadTableCells {
    
    self.cartItemCellsArray = [[NSMutableArray alloc] init];
    NSMutableArray *cartProducts = [ApplicationData getCartProducts];
    for (int i = 0; i < [cartProducts count] ; i++  ) {
        
        CartItemCellView *cartItemCell = [[CartItemCellView alloc]init];
        
        ProductObj *productObject = [cartProducts objectAtIndex:i];
        
        [cartItemCell.imageProductPicture setImageWithURL:[NSURL URLWithString:productObject.picture] placeholderImage:[UIImage imageNamed:@"loader.png"]];
        
        
        cartItemCell.productName.text =  productObject.name;
        cartItemCell.buttonDecProduct.tag =  [productObject.productId integerValue];
        cartItemCell.buttonIncProduct.tag =  [productObject.productId integerValue];
        cartItemCell.productPrice.text = [NSString stringWithFormat:@" %.2f %@",[productObject.price floatValue], [ApplicationData getCurrency] ];
        cartItemCell.productQty.text =  [NSString stringWithFormat:@" %@: %@",[ApplicationData getTranslation:@"Qty"],productObject.cartQty ];
        
        [self.cartItemCellsArray addObject:cartItemCell];
    }
}

- (void)viewWillAppear:(BOOL)animated {
    [self updateCartPage];
}



- (NSInteger)tableView:(UITableView *)tableView numberOfRowsInSection:(NSInteger)section {
    NSLog(@"numberOfRowsInSection: %i",[cartItemCellsArray count]);
    return self.cartItemCellsArray.count;
}

- (NSInteger)numberOfSectionsInTableView:(UITableView *)tableView {
    return 1;
}

- (UITableViewCell *)tableView:(UITableView *)tableView cellForRowAtIndexPath:(NSIndexPath *)indexPath {
    
    CartItemCellView *cellObject = [self.cartItemCellsArray  objectAtIndex:indexPath.row];
    return cellObject.cartItemCell;
}


- (CGFloat) tableView:(UITableView*)tv heightForRowAtIndexPath:(NSIndexPath*)indexPath
{
    CartItemCellView *cellObject = [self.cartItemCellsArray objectAtIndex:indexPath.row];
    return cellObject.cartItemCell.frame.size.height;
}





- (void)decrementCartProduct:(NSNotification *)notification {
    int productId = [notification.object tag];
    [ApplicationData decCartProduct:productId];
    [self updateCartPage];
    
    NSLog(@"decrementCartProduct %i", productId );
}

- (void)incrementCartProduct:(NSNotification *)notification {
    int productId = [notification.object tag];
    [ApplicationData incCartProduct:productId];
    [self updateCartPage];

    NSLog(@"incrementCartProduct %i", productId );
}

- (void)placeOrder {
    if ([[ApplicationData getCartProducts] count] > 0) {
        PlaceOrderViewController *uvcPlaceOrder = [[PlaceOrderViewController alloc] initWithNibName:@"PlaceOrderViewController" bundle:nil];
        [self.navigationController pushViewController: uvcPlaceOrder animated:YES];
    }
}



- (void)viewDidUnload {
    [self setViewTotal:nil];
    [super viewDidUnload];
}
@end
