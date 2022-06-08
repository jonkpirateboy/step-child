find ../. -name "._*" -type f -delete
sass --watch --style compressed style.scss:../css/style.css wp-admin.scss:../css/wp-admin.css -C 
