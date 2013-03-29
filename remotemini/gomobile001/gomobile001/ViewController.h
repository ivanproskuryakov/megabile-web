//
//  ViewController.h
//  Artyot001
//
//  Created by invoice on 1/11/13.
//  Copyright (c) 2013 invoice. All rights reserved.
//

#import <UIKit/UIKit.h>
#import "CategoryObj.h"

@interface ViewController : UIViewController <UITableViewDelegate, UITableViewDataSource>
{
    int x;
}


@property (strong, nonatomic) IBOutlet UITableView *myTableView;
@property (nonatomic, strong) CategoryObj  *currentCategory;

@property (strong, nonatomic)  NSMutableArray *tableCellsArray;

@property (nonatomic) int currentPage;


//FUNCTIONS

-(void) loadTableCells;






@end
