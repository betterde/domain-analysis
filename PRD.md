# 域名品相分析需求文档

## 目的

对给定域名进行检测和分析，并按如下类型进行分类：

* 声母
* 字母
* 数字
* 杂米
* 拼音

## 前端

前端页面要简洁大方，以永不交互为出发点，让操作简单直观。

## 后端

* 针对两级 TLD 进行判断特殊处理，如适配 .com.cn
* 设计渲染模板样式
* 设计域名分析逻辑，支持如声母、字母、数字、杂米、拼音等

考虑用户输入用户可能会输入如下类型的域名：

* 子域名：www.example.com
* 没有 TLD：example
* 存在空格等特殊字符：abc.com, bcd.com
* 区域 TLD：example.com.cn

## 测试用例

```text
aaa.com,123.com,bbb.com,www.baidu.com,how123.com,betterde.com.cn,www.betterde.com,www.com.cn,www.betterde.com.cn
```

输入以上域名列表，对本次需求进行测试。