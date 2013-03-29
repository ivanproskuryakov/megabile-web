//
//  ProductItemViewController.m
//  Artyot001
//
//  Created by invoice on 1/15/13.
//  Copyright (c) 2013 invoice. All rights reserved.
//

#import "ProductItemViewController.h"
#import "ApplicationData.h"
#import "UIImageView+WebCache.h"


@interface ProductItemViewController ()

@end

@implementation ProductItemViewController

@synthesize currentProductObject;


- (id)initWithNibName:(NSString *)nibNameOrNil bundle:(NSBundle *)nibBundleOrNil
{
    self = [super initWithNibName:nibNameOrNil bundle:nibBundleOrNil];
    if (self) {
        // Custom initialization
    }
    return self;
}

- (void)viewDidLoad
{
    [super viewDidLoad];
    
    self.title = currentProductObject.name;

    [self.productAddToCartButton setTitle:[ApplicationData getTranslation:@"Add to Cart"] forState:UIControlStateNormal];
    [self.productAddToCartButton setTitle:[ApplicationData getTranslation:@"Add to Cart"] forState:UIControlStateHighlighted];
    [self.productImage setImageWithURL:[NSURL URLWithString:self.currentProductObject.picture] placeholderImage:[UIImage imageNamed:@"loader.png"]];
    NSLog(@" PIC: %@",self.productImage.image);
    
    self.productName.text = self.currentProductObject.name;
    self.productPrice.text = [NSString stringWithFormat:@" %.2f %@",[self.currentProductObject.price floatValue], [ApplicationData getCurrency] ];
    self.productDescription.text = self.currentProductObject.description;
    
}

- (void)didReceiveMemoryWarning
{
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}

- (IBAction)addToCart:(id)sender {
    [ApplicationData addToCart:currentProductObject];
}
@end
