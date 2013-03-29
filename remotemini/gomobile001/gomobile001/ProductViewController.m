//
//  ProductViewController.m
//  Artyot001
//
//  Created by invoice on 1/13/13.
//  Copyright (c) 2013 invoice. All rights reserved.
//

#import "ProductViewController.h"
#import "ApplicationData.h"
#import "ProductObj.h"
#import "ApplicationData.h"
#import "CategoryObj.h"
#import "ProductItemViewController.h"
#import "ProductObj.h"
#import "ProductLoader.h"
#import "UIImageView+WebCache.h"


static int CELL_COUNT = 5;


@interface ProductViewController ()

@end

@implementation ProductViewController

@synthesize tableCellsArray;
@synthesize currentCategory;
@synthesize currentPage;

- (id)initWithNibName:(NSString *)nibNameOrNil bundle:(NSBundle *)nibBundleOrNil
{
    self = [super initWithNibName:nibNameOrNil bundle:nibBundleOrNil];
    if (self) {
        // Custom initialization
        self.currentCategory = [[CategoryObj alloc] init];
        self.tableCellsArray = [[NSMutableArray alloc] init];
        self.currentPage = 0;
    }
    return self;
}

- (void)viewDidLoad
{
    [super viewDidLoad];
    [self loadTableCells];
}

- (void)viewWillAppear:(BOOL)animated {
    self.title = self.currentCategory.name;
    [self.ProductTableView reloadData];
}

- (BOOL) isAllCellsLoaded {
    if ([self.tableCellsArray count] == [[ApplicationData getCurrentProducts] count]) {
        return YES;
    }
    return NO;
}

-(void) loadTableCells {

    if (!self.isAllCellsLoaded) {
    
        for (int i = self.currentPage * CELL_COUNT; i < [[ApplicationData getCurrentProducts] count] ; i++  ) {
           // NSLog(@" %i ,%i",i, CELL_COUNT);
            ProductCell *productCell = [[ProductCell alloc]init];
            
            ProductObj *productObject = [[ApplicationData getCurrentProducts] objectAtIndex:i];
                        
            [productCell.imageProductPicrure setImageWithURL:[NSURL URLWithString:productObject.picture] placeholderImage:[UIImage imageNamed:@"loader.png"]];
            
            productCell.productName.text = productObject.name;
            productCell.productPrice.text = [NSString stringWithFormat:@" %.2f %@",[productObject.price floatValue], [ApplicationData getCurrency] ];
            
            [self.tableCellsArray addObject:productCell];
            if ([self.tableCellsArray count] == ((self.currentPage+1) * CELL_COUNT)) {
                self.currentPage++ ;
                break;
            }
        }
    }

    [self.ProductTableView reloadData];
}


- (NSInteger)tableView:(UITableView *)tableView numberOfRowsInSection:(NSInteger)section {

    if (self.isAllCellsLoaded) {
        return [self.tableCellsArray count];
    } else {
        return [self.tableCellsArray count] + 1;
    }
}

- (NSInteger)numberOfSectionsInTableView:(UITableView *)tableView {
    return 1;
}

- (UITableViewCell *)tableView:(UITableView *)tableView cellForRowAtIndexPath:(NSIndexPath *)indexPath {
    
    if (indexPath.row == [self.tableCellsArray count]) {
        //[self loadTableCells];
        [NSTimer scheduledTimerWithTimeInterval:1.0 target:self selector:@selector(loadTableCells) userInfo:nil repeats:NO];
        ProductLoader *loaderCellObject = [[ProductLoader alloc] init];
        return loaderCellObject.productLoader;
    } else {
        ProductCell *productCellObject = [self.tableCellsArray  objectAtIndex:indexPath.row];
        return productCellObject.productCell;
    }
    
}

- (CGFloat) tableView:(UITableView*)tv heightForRowAtIndexPath:(NSIndexPath*)indexPath
{

    if (indexPath.row == [self.tableCellsArray count]) {
        return 44;
    } else {
        ProductCell *productCellObject = [self.tableCellsArray objectAtIndex:indexPath.row];
        return productCellObject.productCell.frame.size.height;
    }
}


- (void)tableView:(UITableView *)tableView didSelectRowAtIndexPath:(NSIndexPath *)indexPath {
    
    //NSLog(@"selected item: #%i",indexPath.row);
    if (indexPath.row < self.tableCellsArray.count ) {

        ProductItemViewController *uvcItemProduct = [[ProductItemViewController alloc] initWithNibName:@"ProductItemViewController" bundle:nil];
   
        ProductObj *productObject = [[ApplicationData getCurrentProducts] objectAtIndex:indexPath.row];
        uvcItemProduct.currentProductObject = productObject;

        [self.navigationController pushViewController: uvcItemProduct animated:YES];
    }

}




@end
