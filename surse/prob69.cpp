#include <iostream>
using namespace std;
class A
{
    int i;

public:
    A(int x = 3) : i(x) {}
    virtual int get_i() { return i; }
};
class B : public A
{
    int j;

public:
    B(int x = 10) : j(x) {}
    virtual int get_j() { return A::get_i() + j; }
};
int main()
{
    A o1(5);
    B o2;
    cout << o1.get_i();
    cout << o2.get_j();
    cout << o2.get_i();
    return 0;
}