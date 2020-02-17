alias las='ls -lahSr'
alias artisan='php ./artisan'
alias tinker='php ./artisan tinker'
alias sqlite-local='sqlite3 --list $(pwd)/database/database.sqlite'

PS1="\n___\n\w \$(date +%H-%M-%S)\n\u@\h \\$>\[$(tput sgr0)\]"
