#include <iostream>
#include <typeinfo>
using namespace std;

class A
{
    int n;

public:
    A(int x) { n = x; }
    void afis() { cout << n; }
};

class B : public A
{
public:
    B(int x) : A(x) {}
};
int main()
{
    int x;
    cin >> x;
    if (x > 0)
    {
        A ob(2);
    }
    else
    {
        B ob(2);
    }
    ob.afis();
    return 0;
}
