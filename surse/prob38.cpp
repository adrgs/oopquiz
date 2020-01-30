#include<iostream>
using namespace std;

template<class X, class Y>
X f(X x, Y y)
{
    return x+y;
}
int *f(int *x,int y)
{
    return x-y;
}
int main()
{
    int *a=new int(200), *b=a;
    cout<<*f(a,b);
    return 0;
}
