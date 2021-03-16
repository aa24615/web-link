

# zyan/web-link

获取网站友情链接


## 要求

1. php >= 7.3
2. Composer

## 安装

```shell
composer require zyan/web-link -vvv
```
## 用法

```php
use Zyan\WebLink\WebLink;

$link = new WebLink('http://www.dj97.com');
```

获取友情链接(外链)

```php
$link->externalLinks();

/*
Array
(
    [0] => Array
        (
            [name] => 水晶DJ APP下载
            [url] => http://www.djapp.com.cn/?f=down-97index
        )

    [1] => Array
        (
            [name] => 
            [url] => http://www.djapp.com.cn/?f=down-97index
        )

    [2] => Array
        (
            [name] => 听音乐
            [url] => http://www.lizhi.fm
        )

    [3] => Array
        (
            [name] => 嗨瑶音乐
            [url] => http://www.92kk.com
        )

    [4] => Array
        (
            [name] => 火影忍者
            [url] => http://www.narutom.com
        )
    ...
)
*/

```

重新设置url

```php

$link->setHtml('http://www.baidu.com');
$link->externalLinks();
//...
```

## 参与贡献

1. fork 当前库到你的名下
3. 在你的本地修改完成审阅过后提交到你的仓库
4. 提交 PR 并描述你的修改，等待合并
> 注: 本项目同时发布在gitee 请使用github提交      
> github: https://github.com/aa24615/web-link

## License

[MIT license](https://opensource.org/licenses/MIT)
