#include <iostream>
using namespace std;

class cls {
public:
    float sa;
    cls(float s = 0) { sa = s; }
    operator float() { return sa; }
    float f(float c) { return (sa * (1 + c / 100)); }
};

int main()
{
    cls p(100);
    cout << p.f(p);
}