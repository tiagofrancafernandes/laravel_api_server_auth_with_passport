alias las='ls -lahSr'
alias artisan='php ./artisan'
alias tinker='php ./artisan tinker'
alias sqlite-local='sqlite3 --list $(pwd)/database/database.sqlite'

PS1="\n___\n\w \$(date +%H-%M-%S)\n\u@\h \\$>\[$(tput sgr0)\]"

alias artisan='php ./artisan'
alias artisan-list='php ./artisan list'
alias artisan-list-grep='php ./artisan list |grep'
alias tinker='php ./artisan tinker'
alias bashrc-update='source ~/.bashrc'
