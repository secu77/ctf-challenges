/*
 * gcc -Wall -O2 -fpic -shared -o hook.so hook.c -ldl
 */
#define _GNU_SOURCE 
#include <stdlib.h>
#include <stdio.h>
#include <string.h>
#include <signal.h>
#include <unistd.h>
#include <dlfcn.h>
#include <pwd.h>
#include <sys/types.h>

typedef int (*pfi)(int, char **, char **);
static pfi real_main;


int check_args(int argc, char** argv)
{
    if (argc < 1)
        return 0;
    
    // Checking for shell execution
    if (strcmp(argv[0], "sh") == 0)
        return 1;
    else if (strcmp(argv[0], "bash") == 0)
        return 1;
    else if (strcmp(argv[0], "rbash") == 0)
        return 1;
    else if (strcmp(argv[0], "dash") == 0)
        return 1;
    
    return 0;
}

static int mymain(int argc, char** argv, char** env)
{
    struct passwd *p = getpwuid(getuid());

    if (strcmp(p->pw_name, "www-data") == 0)
    {
        if (check_args(argc, argv) == 1)
        {
            char *alt_flag = "squid-game{Byp4ssAllTh3Th1ngS!}";
            printf("Nice try! But it's not this way. Although, here is your alternative fl4g: %s", alt_flag);
            exit(0);
        }
    }
    
    return real_main(argc, argv, env);
}

int __libc_start_main(pfi main, int argc,
                      char **ubp_av, void (*init) (void),
                      void (*fini)(void),
                      void (*rtld_fini)(void), void (*stack_end))
{
    static int (*real___libc_start_main)() = NULL;

    if (!real___libc_start_main)
    {
        char *error;
        real___libc_start_main = dlsym(RTLD_NEXT, "__libc_start_main");
        if ((error = dlerror()) != NULL)
        {
            fprintf(stderr, "%s\n", error);
            exit(1);
        }
    }
    real_main = main;
    return real___libc_start_main(mymain, argc, ubp_av, init, fini, rtld_fini, stack_end);
}
