## WordPress Skeleton Project

This project is to make a skeleton project for WordPress and make the initialization time faster.

This project built with opinionated approach.

How to use this project:

1. Intercept buffer output from `get_headers` hook.
1. Do html minify with PHP Library called [HTMLMin](https://github.com/voku/HtmlMin).
1. User can activate the html minification from the global settings.
1. Or per posts basis. The setting in the post will take precedence.
