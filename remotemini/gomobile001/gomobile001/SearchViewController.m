//
//  SearchViewController.m
//  Artyot001
//
//  Created by invoice on 1/17/13.
//  Copyright (c) 2013 invoice. All rights reserved.
//

#import "SearchViewController.h"
#import "ApplicationData.h"
#import "ProductCell.h"
#import "ProductLoader.h"
#import "ProductItemViewController.h"
#import "UIImageView+WebCache.h"
#import "LoaderViewController.h"


static int CELL_COUNT = 5;


@interface SearchViewController ()

@end

@implementation SearchViewController


@synthesize tableCellsArray;
@synthesize currentPage;

- (id)initWithNibName:(NSString *)nibNameOrNil bundle:(NSBundle *)nibBundleOrNil
{
    self = [super initWithNibName:nibNameOrNil bundle:nibBundleOrNil];
    if (self) {
        UIImage* icon = [UIImage imageNamed:@"tab-icon1"];
        [self.tabBarItem setFinishedSelectedImage:icon withFinishedUnselectedImage:icon];
        
        [self clearSearch];
        UIBarButtonItem *flipButton = [[UIBarButtonItem alloc]
                                       initWithTitle:[ApplicationData getTranslation:@"Clear"]
                                       style:UIBarButtonItemStyleBordered
                                       target:self
                                       action:@selector(clearSearch)];
        self.navigationItem.leftBarButtonItem = flipButton;
        
    }
    return self;
}

- (void)viewDidLoad {
    
//    LoaderViewController *splashVC = [[LoaderViewController alloc] initWithNibName:@"LoaderViewController" bundle:nil];
//    [self.navigationController presentModalViewController:splashVC animated:NO];
//    [self performSelector:@selector(hideSplash) withObject:nil afterDelay:2.0];    

    
    for (UIView *view in self.searchBarSearch.subviews){
        if ([view isKindOfClass: [UITextField class]]) {
            UITextField *tf = (UITextField *)view;
            tf.delegate = self;
            break;
        }
    }
}

- (void) hideSplash {
    [[self.navigationController modalViewController] dismissModalViewControllerAnimated:NO];
}

- (void)searchBarCancelButtonClicked:(UISearchBar *) aSearchBar {
	[self clearSearch];
}

- (BOOL)textFieldShouldClear:(UITextField *)textField {
    //if we only try and resignFirstResponder on textField or searchBar,
    //the keyboard will not dissapear (at least not on iPad)!
    [self performSelector:@selector(searchBarCancelButtonClicked:) withObject:self.searchBarSearch afterDelay: 0.1];
    return YES;
}



- (void)viewWillAppear:(BOOL)animated {
    NSLog(@" getCurrentSearchProducts - %i", [self.tableCellsArray count]);
    NSLog(@" currentPage - %i", self.currentPage);
    [self.tableViewProducts reloadData]; 
}



- (void)searchBarSearchButtonClicked:(UISearchBar *)searchBar {
    [searchBar resignFirstResponder];
    [ApplicationData setCurrentProductsForSearch:searchBar.text];
    self.navigationItem.title =  [NSString stringWithFormat:@"%@:%i",[ApplicationData getTranslation:@"Results"],[[ApplicationData getCurrentSearchProducts] count]];
    [self loadTableCells];
}

- (void) clearSearch {
    [self.searchBarSearch resignFirstResponder];
    [ApplicationData clearCurrentSearchProducts];
    
    self.tableCellsArray = [[NSMutableArray alloc] init];
    self.searchBarSearch.text = @"";
    self.currentPage = 0;

    self.tabBarItem.title = [ApplicationData getTranslation:@"Search"];
    self.navigationItem.title =  [ApplicationData getTranslation:@"Search"];
    [self.tableViewProducts reloadData]; 
    //self.navigationBarSearh. = @"Search 001";
}


- (BOOL) isAllCellsLoaded {
    if ([self.tableCellsArray count] == [[ApplicationData getCurrentSearchProducts] count]) {
        return YES;
    }
    return NO;
}


-(void) loadTableCells {
    
    if (!self.isAllCellsLoaded) {
        for (int i = self.currentPage * CELL_COUNT; i < [[ApplicationData getCurrentSearchProducts] count] ; i++  ) {
            ProductCell *productCell = [[ProductCell alloc]init];
            ProductObj  *productObject = [[ApplicationData getCurrentSearchProducts] objectAtIndex:i];

            [productCell.imageProductPicrure setImageWithURL:[NSURL URLWithString:productObject.picture] placeholderImage:[UIImage imageNamed:@"loader.png"]];
            
            productCell.productName.text = productObject.name;
            productCell.productPrice.text = [NSString stringWithFormat:@" %.2f %@",[productObject.price floatValue], [ApplicationData getCurrency] ];
            
            NSLog(@"'%@'",[NSURL URLWithString:productObject.picture]);
            [self.tableCellsArray addObject:productCell];
            if ([self.tableCellsArray count] == ((self.currentPage+1) * CELL_COUNT)) {
                self.currentPage++ ;
                break;
            }
        }
    }        
    [self.tableViewProducts reloadData];     

}

- (NSInteger)tableView:(UITableView *)tableView numberOfRowsInSection:(NSInteger)section {
    
    
    NSLog(@"isAllCellsLoaded %i", self.isAllCellsLoaded);
    
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


- (void)tableView:(UITableView *)tableView didSelectRowAtIndexPath:(NSIndexPath *)indexPath {
    if (indexPath.row < self.tableCellsArray.count ) {
        //NSLog(@" index = %i product", indexPath.row);
        
        ProductItemViewController *uvcItemProduct = [[ProductItemViewController alloc] initWithNibName:@"ProductItemViewController" bundle:nil];
        
        ProductObj *productObject = [[ApplicationData getCurrentSearchProducts] objectAtIndex:indexPath.row];
        uvcItemProduct.currentProductObject = productObject;
        
        [self.navigationController pushViewController: uvcItemProduct animated:YES];
    }
}


- (CGFloat) tableView:(UITableView*)tv heightForRowAtIndexPath:(NSIndexPath*)indexPath
{
    if (indexPath.row == [self.tableCellsArray count]) {
        ProductLoader *loaderCellObject = [[ProductLoader alloc] init];
        return loaderCellObject.productLoader.frame.size.height;
    } else {
        ProductCell *productCellObject = [[ProductCell alloc] init];
        return productCellObject.productCell.frame.size.height;
    }

}


- (IBAction)barButtonClearClick:(UIBarButtonItem *)sender {
    [self clearSearch];
    [self.tableViewProducts reloadData];
}

@end
