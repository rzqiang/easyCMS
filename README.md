# easyCMS

### 介绍
easyCMS是早年和同事开发的一套后台管理系统，这个版本修复了对PHP7的一些兼容问题。
这是一款基于thinkphp3.2 + EasyUI（jquery.easyui.1.4.2.js）开发的开源后台管理系统。
支持项目自动安装，内置菜单管理，权限管理，用户操作，操作日志等功能，可以快速的构建您所需要的系统模块，环境软件版本要求较低，适合用于企业管理后台或者个人网站。

### 安装
#### 下载项目
<pre>
git clone https://github.com/rzqiang/easyCMS.git easycms
</pre>
#### 修改DB配置
修改 easycms/App/Common/Conf/config.php中的数据配置，确保可以成功连接数据库
<pre>
/* 数据库设置 */
'DB_TYPE'               => 'mysqli',      // 数据库类型
'DB_HOST'               => '127.0.0.1',   // 服务器地址
'DB_NAME'               => 'easycms',     // 数据库名
'DB_USER'               => 'root',        // 用户名
'DB_PWD'                => 'root',        // 密码
'DB_PORT'               => '3306',        // 端口
'DB_PREFIX'             => 'es_',         // 数据库表前缀
</pre>
#### 引导安装
访问你的项目地址，例如 http://easycms.com , 未安装时会自动跳转至http://easycms.com/install/index/index.html ,按引导安装即可。
注：项目中有imageMagick插件，但没有使用，不影响项目正常运行。如需使用，请安装相应扩展，可参考 http://www.imagemagick.com.cn/

后台默认：
用户名：admin
密码：123456

### 在线文档
请参考<br/>
http://document.thinkphp.cn/（ThinkPHP开发手册）<br/>
http://jeasyui.com/documentation/（EasyUI开发手册)


### 感谢
感谢ThinkPHP，EasyUi，JQUERY等开源项目.