//
//  LoaderViewController.h
//  gomobile001
//
//  Created by invoice on 2/26/13.
//  Copyright (c) 2013 magazento.com. All rights reserved.
//

#import <UIKit/UIKit.h>


@interface LoaderViewController : UIViewController {
   NSMutableString *currentNode;
}

@property (strong, nonatomic) IBOutlet UIProgressView *progressLoader;
@property (strong, nonatomic) IBOutlet UILabel *labelTotal;
@property (strong, nonatomic) IBOutlet UILabel *labelNow;

@property (strong, nonatomic)  NSMutableData *fileData;
@property (strong,nonatomic) NSNumber* fileSize;

@property (strong, nonatomic) NSMutableString *currentNode;
@property (strong, nonatomic) NSString *apiAddress;
@property (strong, nonatomic) NSString *userId;
@property int apiProducts;

- (void) startProgramm;
- (void) saveUpdateDate:(int) date;
- (BOOL) isDatesEquals:(int) date;
- (int) getSaveDate;
+ (NSData *)base64DataFromString: (NSString *)string;
@end
