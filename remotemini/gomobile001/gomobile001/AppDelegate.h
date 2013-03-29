//
//  AppDelegate.h
//  Artyot001
//
//  Created by invoice on 1/11/13.
//  Copyright (c) 2013 invoice. All rights reserved.
//

#import <UIKit/UIKit.h>


@class ViewController;

@interface AppDelegate : UIResponder <UIApplicationDelegate> {
    
    
    
}

- (void)setNetworkActivityIndicatorVisible:(BOOL)setVisible;
- (void)customizeiPhoneTheme;


@property (strong, nonatomic) UIWindow *window;
@property (strong, nonatomic) ViewController *viewController;

@end
