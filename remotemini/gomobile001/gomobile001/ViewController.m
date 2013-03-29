//
//  ViewController.m
//  Artyot001
//
//  Created by invoice on 1/11/13.
//  Copyright (c) 2013 invoice. All rights reserved.
//


#import "CategoryObj.h"
#import "XmlProcessing.h"
#import "ViewController.h"
#import "ProductViewController.h"
#import "ApplicationData.h"
#import "ProductCell.h"
#import "ProductItemViewController.h"
#import "ProductLoader.h"
#import "UIImageView+WebCache.h"
#import "UIImage+iPhone5.h"



static int CELL_COUNT = 5;

@interface ViewController ()

@end

@implementation ViewController

@synthesize currentCategory;
@synthesize tableCellsArray;
@synthesize currentPage;




- (id)initWithNibName:(NSString *)nibNameOrNil bundle:(NSBundle *)nibBundleOrNil
{
    self = [super initWithNibName:nibNameOrNil bundle:nibBundleOrNil];
    if (self) {
        
        UIImage* icon = [UIImage imageNamed:@"tab-icon2"];
        [self.tabBarItem setFinishedSelectedImage:icon withFinishedUnselectedImage:icon];
        self.title = [ApplicationData getTranslation:@"Catalog"];
        self.tabBarItem.title = [ApplicationData getTranslation:@"Catalog"];
        self.currentCategory = [[CategoryObj alloc] init];
        self.tableCellsArray = [[NSMutableArray alloc] init];
        self.currentPage = 0;
        
        self.currentCategory.parentId = @"2"; // SET PARENT = ROOT CATEGORY
        self.currentCategory.name = [ApplicationData getTranslation:@"Catalog"]; // SET NAME = ROOT CATEGORY
    }
    return self;
}

- (void)viewDidLoad
{
    [super viewDidLoad];
    self.myTableView.backgroundColor = [UIColor blackColor];
    //    self.myTableView.backgroundColor = [UIColor colorWithPatternImage:[UIImage tallImageNamed:@"bg.png"]];
    
    
}

- (void)viewWillAppear:(BOOL)animated {
    [self loadTableCells];
    self.title =self.currentCategory.name;
}

- (BOOL) isAllCellsLoaded {
    if ([self.tableCellsArray count] == [[ApplicationData getCurrentProducts] count]) {
        return YES;
    }
    return NO;
}


-(void) loadTableCells {
    [ApplicationData setCurrentProductsForCategoryId: currentCategory.parentId]; // FIX
    
    if (!self.isAllCellsLoaded) {
        
        
        for (int i = self.currentPage * CELL_COUNT; i < [[ApplicationData getCurrentProducts] count] ; i++  ) {
            
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
    [self.myTableView reloadData];
}




- (NSInteger)tableView:(UITableView *)tableView numberOfRowsInSection:(NSInteger)section {
    
    
    switch (section) {
        case 0:
            return [[ApplicationData getCategoriesForParentId:self.currentCategory.parentId] count];
            break;
        case 1:
            if (self.isAllCellsLoaded) {
                return [self.tableCellsArray count];
            } else {
                return [self.tableCellsArray count] + 1;
            }
            
            //return [[ApplicationData getCurrentProducts] count];
            break;
    }
    
    
}

- (NSInteger)numberOfSectionsInTableView:(UITableView *)tableView {
    return 2;
}

- (UITableViewCell *)tableView:(UITableView *)tableView cellForRowAtIndexPath:(NSIndexPath *)indexPath {
    //NSLog(@" sections %i",[self.myTableView numberOfSections]);
    
    NSInteger section = [indexPath section];
    switch (section) {
        case 0: {
            NSMutableArray *tempArray = [ApplicationData getCategoriesForParentId:self.currentCategory.parentId];
            CategoryObj *categoryObject = [tempArray objectAtIndex:indexPath.row];
            UITableViewCell *cell = [[UITableViewCell alloc] init];
            //            cell.textLabel.text = [NSString stringWithFormat: @"%@ #%@ - %i", categoryObject.name, categoryObject.categoryId, [ApplicationData getProductCount:categoryObject.categoryId]];
            cell.textLabel.text = [NSString stringWithFormat: @"%@", categoryObject.name];
            
            return cell;
        }
            break;
        case 1: {
            
            if (indexPath.row == [self.tableCellsArray count]) {
                [NSTimer scheduledTimerWithTimeInterval:1.0 target:self selector:@selector(loadTableCells) userInfo:nil repeats:NO];
                ProductLoader *loaderCellObject = [[ProductLoader alloc] init];
                return loaderCellObject.productLoader;
            } else {
                ProductCell *productCellObject = [self.tableCellsArray  objectAtIndex:indexPath.row];
                return productCellObject.productCell;
            }
            //            ProductCell *productCellObject = [self.tableCellsArray  objectAtIndex:indexPath.row];
            //            return productCellObject.productCell;
            
        }
            break;
    }
    
}



- (void)tableView:(UITableView *)tableView didSelectRowAtIndexPath:(NSIndexPath *)indexPath {
    
    NSLog(@" sections %i",[self.myTableView numberOfSections]);
    NSLog(@" sections %i",[indexPath section]);
    NSInteger section = [indexPath section];
    switch (section) {
        case 0: {
            NSLog(@" section %i",section);
            NSMutableArray *currentCategoryArray = [ApplicationData getCategoriesForParentId:self.currentCategory.parentId];
            CategoryObj *categoryObject = [currentCategoryArray objectAtIndex:indexPath.row];
            currentCategoryArray = [ApplicationData getCategoriesForParentId: categoryObject.categoryId];
            
            if ([currentCategoryArray count] ) {
                NSLog(@" section %i index = %i category = %@",section, indexPath.row,categoryObject.categoryId);
                ViewController *uvcCategory = [[ViewController alloc] initWithNibName:@"ViewController" bundle:nil];
                uvcCategory.currentCategory.parentId = categoryObject.categoryId;
                uvcCategory.currentCategory.name = categoryObject.name;
                [self.navigationController pushViewController: uvcCategory animated:YES];
                
            } else {
                NSLog(@" section %i index = %i category = %@",section, indexPath.row,categoryObject.categoryId);
                [ApplicationData setCurrentProductsForCategoryId: categoryObject.categoryId]; // FIX
                if ([[ApplicationData getCurrentProducts] count]) {
                    ProductViewController *uvcProduct = [[ProductViewController alloc] initWithNibName:@"ProductViewController" bundle:nil];
                    uvcProduct.currentCategory.name = categoryObject.name;
                    [self.navigationController pushViewController: uvcProduct animated:YES];
                }
                
            }
        }
            break;
            
        case 1: {
            
            if (indexPath.row < self.tableCellsArray.count ) {
                NSLog(@" section %i index = %i product",section, indexPath.row);
                
                ProductItemViewController *uvcItemProduct = [[ProductItemViewController alloc] initWithNibName:@"ProductItemViewController" bundle:nil];
                
                ProductObj *productObject = [[ApplicationData getCurrentProducts] objectAtIndex:indexPath.row];
                uvcItemProduct.currentProductObject = productObject;
                
                [self.navigationController pushViewController: uvcItemProduct animated:YES];
            }
        }
            break;
    }
    
    
    
}



- (CGFloat) tableView:(UITableView*)tv heightForRowAtIndexPath:(NSIndexPath*)indexPath
{
    
    NSInteger section = [indexPath section];
    switch (section) {
        case 0: {
            UITableViewCell *cell = [[UITableViewCell alloc] init];
            return cell.frame.size.height;
        }
            break;
        case 1: {
            
            if (indexPath.row == [self.tableCellsArray count]) {
                
                ProductLoader *loaderCellObject = [[ProductLoader alloc] init];
                return loaderCellObject.productLoader.frame.size.height;
            } else {
                ProductCell *productCellObject = [[ProductCell alloc] init];
                return productCellObject.productCell.frame.size.height;
            }
            
            
        }
            break;
    }
    
    
}











@end
