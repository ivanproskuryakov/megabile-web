//
//  ProductViewController.h
//  Artyot001
//
//  Created by invoice on 1/13/13.
//  Copyright (c) 2013 invoice. All rights reserved.
//

#import <UIKit/UIKit.h>
#import "ProductCell.h"
#import "CategoryObj.h"



@interface ProductViewController : UIViewController


@property (strong, nonatomic) IBOutlet UITableView *ProductTableView;
@property (strong, nonatomic)  NSMutableArray *tableCellsArray;
@property (strong, nonatomic)  CategoryObj *currentCategory;
@property (nonatomic) int currentPage;


-(void) loadTableCells;
- (BOOL) isAllCellsLoaded;

@end
