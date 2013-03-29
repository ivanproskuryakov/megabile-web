//
//  SearchViewController.h
//  Artyot001
//
//  Created by invoice on 1/17/13.
//  Copyright (c) 2013 invoice. All rights reserved.
//

#import <UIKit/UIKit.h>

@interface SearchViewController : UIViewController
@property (strong, nonatomic) IBOutlet UITableView *tableViewProducts;
@property (strong, nonatomic) IBOutlet UISearchBar *searchBarSearch;


@property (strong, nonatomic)  NSMutableArray *tableCellsArray;
@property (nonatomic) int currentPage;

- (BOOL) isAllCellsLoaded;
- (void) clearSearch;

@end
