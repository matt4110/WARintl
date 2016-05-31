A few notes about this child theme:

build started on May 31, 2016 by Matthew Johnson (Women At Risk, international webmaster)

This theme utilizes Sass for its CSS architecture
We will be using grunt to minimize the CSS

A note on the CSS utility classes: After dealing with the last theme and its complexity and its progress of design, I decided to utilize utility classes for margin and padding. I'm hoping that this will allow a certain freedom to override inherit margins and paddings for quick builds and edits without fighting inherit styling and therefore cutting the usage of !important (for everything besides utility classes). Feel free to read this article which helped form my thoughts on this (https://css-tricks.com/when-using-important-is-the-right-choice/). This is not meant to allow for sloppy code but rather provide a way to keep css markup down and still allow freedom of styling within the WordPress page/post text editor.