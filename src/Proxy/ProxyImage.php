<?php

/**
 * 在代理模式中，我们创建具有现有对象的对象，以便向外界提供功能接口。
 * 1、Windows 里面的快捷方式。
 * 2、猪八戒去找高翠兰结果是孙悟空变的，可以这样理解：把高翠兰的外貌抽象出来，高翠兰本人和孙悟空都实现了这个接口，猪八戒访问高翠兰的时候看不出来这个是孙悟空，所以说孙悟空是高翠兰代理类。
 * 3、买火车票不一定在火车站买，也可以去代售点。
 * 4、一张支票或银行存单是账户中资金的代理。支票在市场交易中用来代替现金，并提供对签发人账号上资金的控制。
 * 优点：
 * 1、职责清晰。 2、高扩展性。 3、智能化。
 * 缺点：
 * 1、由于在客户端和真实主题之间增加了代理对象，因此有些类型的代理模式可能会造成请求的处理速度变慢。
 * 2、实现代理模式需要额外的工作，有些代理模式的实现非常复杂。
 * 例子:从服务器读取一张图片的时候,第一次从硬盘读取,将资源对象代理,第二次读取的时候就使用代理对象去读取。
 */
namespace MCTing\Design\Proxy;


class ProxyImage implements ImageInterface
{
    private $realImage;
    private $fileName;

    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    public function display(): void
    {
        if ($this->realImage == null) {
            $this->realImage = new RealImage($this->fileName);
        }
        return $this->realImage->display();
    }
}