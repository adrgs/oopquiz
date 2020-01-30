#include <iostream>
using namespace std;
class cls {
    int x;

public:
    cls(int i = -20) { x = i; }
    const int& f() { return x; }
};
int main()
{
    cls a(14);
    int b = a.f()++;
    cout << b;
    return 0;
}