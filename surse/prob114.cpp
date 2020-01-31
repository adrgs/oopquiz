#include <iostream>
using namespace std;
struct X
{
    int i;

public:
    X(int ii) { i = ii; };
    int f1() const { return i; }
    X f2() const
    {
        int i = this->f1();
        return X(74 - i);
    }
};
const X f3() { return X(8); }
int f4(const X &x) { return x.f1(); }
int main()
{
    X ob(19);
    cout << f4(ob.f2());
    return 0;
}