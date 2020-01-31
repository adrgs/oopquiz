#include <iostream>
using namespace std;
class B
{
protected:
    int x;

public:
    B(int i = 3) { x = i; }
    virtual B f(B ob) { return x + ob.x; }
    void afisare() { cout << x; }
};
class D : public B
{
public:
    D(int j = 4) : B(j + 2) { int i = j; }
    D f(D ob) { return x + 1; }
};
int main()
{
    B *p1 = new D, *p2 = new B, *p3 = new B(p1->f(*p2));
    p3->afisare();
    return 0;
}