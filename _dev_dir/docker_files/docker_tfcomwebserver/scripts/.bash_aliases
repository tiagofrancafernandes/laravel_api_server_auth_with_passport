########BEGIN ALIAS
#CORES ./linuxbashrc

##PERIGOSAS
alias ch7R='chmod 777 -R'
alias apt='sudo apt'
alias apts='apt search'
alias aptl='sudo apt install'
alias dpkg='sudo dpkg'
alias update='sudo apt update'
alias upgrade='sudo apt upgrade'
alias aptfixkey='sudo apt-key adv --keyserver keyserver.ubuntu.com --recv-keys'
alias aptfix='sudo apt --fix-broken install'
alias reiniciar_apache='sudo service apache2 restart'
alias processousuario='ps -U tiago'
alias processo='ps -eo pid,time,start,stime,args --sort=etime |grep'
alias processodetalhado='ps -ef | grep'
alias processousuariodetalhado='ps -ef -U $USER | grep'
alias mataprocessoid='sudo kill -9'
alias mataprocessonome='sudo killall -KILL'
alias mataprocesso='sudo killall -KILL'
##END

##LS GREP E OUTROS
alias ls='ls -lhS --color=auto'
alias l='ls -lhS --color=auto'
alias las='ls -lahsS --color=auto'
alias lgrep='ls -lhS --color=auto |grep'
alias cls='clear'
alias nano='nano -$ -lT 2'
##END LS

#############
####Funcoes
cria_pasta()
{
PASTA=$@
mkdir -p "$PASTA"
}

cria_alias()
{
  ALIAS=$1
  shift;
  #Tendo colocado a primeira parte, o resto é comando...
  COMANDO=$@
  alias $ALIAS="$COMANDO"
  echo ALIAS:$ALIAS COMANDO:$COMANDO
}

export MACHINE_NAME="HOST_UBUNTU"

####Cores PS1
seta()
{
PS1="\e[01;31m┌─[\e[01;35m\u\e[01;31m]──[\e[00;37m${HOSTNAME%%.*}\e[01;32m]:\w$\e[01;31m\n\e[01;31m└──\e[01;36m>>\e[00m"
export PS1="\e[01;31m┌─[\e[01;35m\u\e[01;31m]──[\e[00;37m${HOSTNAME%%.*}\e[01;32m]:\w$\e[01;31m\n\e[01;31m└──\e[01;36m>>\e[00m"
}

azul()
{
PS1='${debian_chroot:+($debian_chroot)}\[\033[01;32m\]\u@\h\[\033[00m\]:\[\033[01;34m\]\w\[\033[00m\]\$ '
export PS1='${debian_chroot:+($debian_chroot)}\[\033[01;32m\]\u@\h\[\033[00m\]:\[\033[01;34m\]\w\[\033[00m\]\$ '
}



cor2019()
{
  SCRIPT_CURRENT_BRANCH=/home/tiago/ntfs/scripts/git_shell/current_branch
  if [ -f $SCRIPT_CURRENT_BRANCH ]; then
    source $SCRIPT_CURRENT_BRANCH;
    export PS1="--------\n\[\e[91m\]\u\[\e[38;5;208m\]@\[\e[92m\]\h:\[\e[96m\]\$PWD\[\e[35m\] \$(date +%d-%m-%Y__%H:%m:%S | sed 's/\//-/g')\n\[\e[38;5;208m\]\`parse_git_branch\`\n[$MACHINE_NAME \u] \\$~> \[\e[0m\]";
  else
    export PS1="--------\n\[\e[91m\]\u\[\e[38;5;208m\]@\[\e[92m\]\h:\[\e[96m\]\$PWD\[\e[35m\] \n\$(date +%d-%m-%Y__%H:%m | sed 's/\//-/g')\n\[\e[38;5;208m\][$MACHINE_NAME \u] \\$~> \[\e[0m\]"

  fi

}
cor2019

#seta
##END Cores PS1
#############
##END Funcoes


##GIT
alias gitstatus='git status'
alias gitdiff='git diff'
alias gitbranch='git branch |grep "* "'
alias branch='git branch |grep "* "'
alias gitPushSetUpstreamOriginMaster='git push --set-upstream origin master'
##END git


########END ALIAS

######################################
####### EXTRACT ALIASES ##############
#----------------------------------------------------
#Extrair (Todas)

#Extract things. Thanks to urukrama, Ubuntuforums.org
extrair () {
if [ -f $1 ] ; then
local pasta="$1_ext"
mkdir -p $pasta
echo ..........................................
echo -e '\033[00;37mExtraindo para \033[01;34m'$pasta'\033[00;37m'
echo ..........................................
case $1 in
*.tar.bz2) tar xvjf $1 -C ./$pasta;;
*.tar.gz) tar xvzf $1 -C ./$pasta;;
*.bz2) bunzip2 $1 -C ./$pasta;;
*.rar) rar x $1 -C ./$pasta;;
*.gz) gunzip $1 -C ./$pasta;;
*.tar) tar xvf $1 -C ./$pasta;;
*.tbz2) tar xvjf $1 -C ./$pasta;;
*.tgz) tar xvzf $1 -C ./$pasta;;
*.zip) unzip $1 -C ./$pasta;;
*.Z) uncompress $1 -C ./$pasta;;
*.7z) 7z x $1 -C ./$pasta;;
*) echo "'$1' Não foi possivel extrair o arquivo pelo extrair()" ;;
esac
else
echo "'$1' não e um arquivo valido"
fi
}

#----------------------------------------------------
#Extrair (Por Tipo)

#zip:
alias extrair.zip='gunzip'

#rar:
alias extrair.rar='unrar x'

#tar:
alias extrair.tar='tar -xvf'

#tar.gz:
alias extrair.tar.gz='tar -vzxf'

#bz2:
alias extrair.bz2='bunzip'

#tar.bz2:
alias extrair.tar.bz2='tar -jxvf'

####### END EXTRACT ALIASES ##########
######################################

####### TRATANDO ARQUIVOS ############
alias substitui='f(){
 if [[ ( -z "$1" ) || ( -z "$2" ) || ( -z "$3") ]]; then 
  echo -e "Incorreto.\nUsar:\n substitui oQue peloQue nesteArquivo" ; 
 else 
 if [ -f "$3" ]; then
  echo "nao e arquivo ou nao existe" ;
 else 
  sed -i "s/$1/$2/g" $3 && unset -f f; 
 fi; 
 fi; 
 }; f'


######################################

if [ -f ~/.bash_aliases_local ]; then
	source ~/.bash_aliases_local
fi
