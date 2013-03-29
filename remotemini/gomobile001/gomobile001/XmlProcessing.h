//
//  XmlProcessing.h
//  Artyot001
//
//  Created by invoice on 1/12/13.
//  Copyright (c) 2013 invoice. All rights reserved.
//

#import <Foundation/Foundation.h>

@interface XmlProcessing : NSObject <NSXMLParserDelegate> {
    
    NSMutableString *currentNode;
    NSMutableArray  *mainCategoryXmlArray;
    NSMutableArray  *mainProductXmlArray;
    NSString        *currency;
    NSString        *orderEmailAddress;
    NSMutableString        *tempstring;
    NSMutableDictionary *translate;
    BOOL isExit;
}


@property (nonatomic, strong) NSMutableArray  *mainCategoryXmlArray;
@property (nonatomic, strong) NSMutableArray  *mainProductXmlArray;
@property (strong, nonatomic) NSMutableString *currentNode;
@property (strong, nonatomic) NSString        *orderEmailAddress;
@property (strong, nonatomic) NSMutableString *tempstring;

@property (nonatomic, strong) NSMutableDictionary *companysettings;
@property (nonatomic, strong) NSMutableDictionary *mailsettings;
@property (nonatomic, strong) NSMutableDictionary *translate;

@property BOOL isExit;

- (void) startXmlProcessing;
    
@end
