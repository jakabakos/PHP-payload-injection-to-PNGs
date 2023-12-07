# Inject PHP code into PNG files through PLTE chunks

This repo is created for a blog post written at vsociety about SugarCRM RCE (CVE-2023-22952). The RCE vulnerability is present in

1.  SugarCRM versions 11.0 (Enterprise, Professional, Sell, Serve, and Ultimate, pre-11.0.5), as well as
2.  SugarCRM versions 12.0 Enterprise, Sell, and Serve (pre-12.0.2).

I am not the owner of this code. The original version of this generator PHP script can be found [here](https://github.com/synacktiv/astrolock/blob/8f804f5a52f6cd0b138954d9bc82ae22e6a09cd0/payloads/generators/gen_plte_png.php#L22). Based on [this](https://www.synacktiv.com/publications/persistent-php-payloads-in-pngs-how-to-inject-php-code-in-an-image-and-keep-it-there.html) article.

With this script, you can inject PHP payload into PNG files through PLTE chunks.
Usage:

```bash
php gen.php '<?php phpinfo() ?>' malicious.php
```
