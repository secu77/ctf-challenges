#include <stdio.h>

int main () {
  int _x213 = 23;
  int _[] = {124,109,124,105,144,107,127,96,133,126,127,120,103,103,124,133,123,106,89,112,120,105,124,120,106,134,101};
  char __[7];
  char x2213_ = 'b';
  long int s3cr3t__ = 4815159197;
  long int _c_ = 0;

  for(int i = 0; i < (sizeof(_)/sizeof(int)); i++)
  {
    x2213_ = _[i];
    s3cr3t__ += _[i];
    x2213_ -= _x213;
  }
  
  printf("Enter the code Jack: ");
  scanf("%ld",&_c_);
  fflush(stdin);

  if (_c_==s3cr3t__) {
    for(size_t i = 0; i < (sizeof(_)/sizeof(int)); i++)
    {
      __[i] = _[i] - _x213;
    }
    printf("Access Granted! Flag: biptup18{%s}",__);
  } else {
    printf("Access Denied!");
  }

  return 0;
}