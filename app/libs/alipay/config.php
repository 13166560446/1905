<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016101400684198",

		//商户私钥，您的原始格式RSA私钥
		'merchant_private_key' => "MIIEpgIBAAKCAQEAx8XZK5mwAM7Xfvjmd9gmujyVD/W8Q1gKMfiH/yQds1Uer3jHVXqMFuxw44+ZFMR4T+ihVPsyNCKTBg7SSijgBNTAWrYJ9nOA81h1XKsQXLpkP3F9Z4A+W2qK8balfz7q+2XuVcr9+BnHn4PaqCr0YhycjYqZKvcwQQTQ3cwh7rQb/BEdYN3XoUsSjIrt95IFFJpGRSwQZfT1ufs/7mAXGctPsvRE6pUIfj96+Nuc/wSCWzrjAmsu8OKFz1ScG1ZrzYDFM9ByudZRCipZbPdelpEjAVTnJ1qgNGCrAXatJwoN5DnQsyrRQapwlniX3hy4XpTpjqKYl54oFNO0LfufbQIDAQABAoIBAQCqdG9D24OofNS0u01yrpUEzVJm5sb3MzSnxKbNlZReAuAG2uhCUCkeGiqMkGcOqED79cNKjnccsu99+MGHk27p0Fo8TB0eExnRCQZCxpdUd5m35G8bE/qg57ycV7rIYvf+/88nlueyfNSuj8PPP69702vk/YCJf5bFs4U/6sB9OeAMcHAlSjLnE3H1UarYdwRvhDBxhJDicUYtFi6f4wvtimpOR77ZJZRoZmOL5W8WTZYiR+N2T3cLVmoFRR0YzhKcAivS+3PJQQkEbM376YY9Gh1VvfyDhz7D8VnA0ieXblaSTqCdRAJcueTj3MW33pSDgCmzgk09oyx4RB4OpoblAoGBAPB9Ks4aqXAr3ykqqVFks/fB3EwG6FCAacQ6y5mfgAho0QO4jMqyXSGQ7yx48eWWbRnmLUsYvh7Yo7OoKx+fY5lugKGmiWuPeuo6cmwCcPGdbJ1ykE3jBkmSGJaRHr9MNNsCwxEFEbFcYZxRjYzmmOkQ7Ja5mGmgx8yoP6BA74szAoGBANSoZb8FZ8hf72XOQS6nc3BZPEk+T3VaKziJRRqMj7akwLSjapu0NoDSpcGWAbgfuormBV4qE2dP4oodPaV1Rd/2hEah/L7f82fGd5AOpoRh6zwMcEUUK2G/oYNxKdJaDqFgz4IjSMLLBN/VoJUwYc6NW6UWZ7kr1xD0nyVlmSrfAoGBAKVN5DZ3rTAld+fcIzaHeg07fCnmNZngKtNvdrPKJz+gjMt594z8vXdtIHn5SIz/sU60IT4Va9nYH+5GEh5SeSvmARUcXClLHroSIsSLiQcLprUzIm3nN1Mq0Svt5KypvUstwtfYHClFzvKcPCg1+bV6pKWWPWWd1riejd2hxQZxAoGBAMHEKulSAI2INHcb5zKea0YMWS0XtIjmPwmFskyNlQlDtz8gw6vaGetphJUOnMRrTKrxCiURy5pQJMfZ+ui/IYr/cOl3Affd0UhWg2zknH91RUTyxH188kZfuMgunX/IhRowPwOCKPMsz2UwnuAxNH1jOgUDlEEaHB2b90K4/0YbAoGBAIEOyfb6CLk7zRHZdAr0RkDSvtXHOt4Ef1Dt7oAjANaS1ytD2Jll5GXRGghMCjr17PNOjFMIctow5ed/icYu48HJhnvHEL7ad4finWiNrtet2T8WI2xUY2YLmnes/F/PaiGA1C58j0UKos/V0sUUr90SiO+8JG6/Hl3/JutbhKp0",
		
		//异步通知地址
		'notify_url' => "http://工程公网访问地址/alipay.trade.wap.pay-PHP-UTF-8/notify_url.php",
		
		//同步跳转
		'return_url' => "http://mitsein.com/alipay.trade.wap.pay-PHP-UTF-8/return_url.php",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAv3uyLVtuxc621LmfDciSESkMp4RRwqB0Ayr470f5IyiNmF1J2rW1WNzYrh6MgrYTUVZiH+QbyGO80E5liCTtt7R0v6B0YQhDTsnpIgVjKY7Auv4xSKxD1KyI0eeJJh3Sg9qafoCWwBQ8p7DVPi9aGEfRfxwfscKDXJ9WaOfUwHaZSBBUrfZvNSxjuFB6pk60850lwyODjA4yJS7G6is8+GQj8rRYP4S1exWjkJAQMTASczOthKOzMHI+ni0WX73swz17PLtPpnJyK+i4JRa+Rhy1TF59tlL8L+2tJaWKvKeaAAdI4dbVbSfo/tDhQDR5fPHvTrCYj0ltqJESHFeH1wIDAQAB",
		
	
);