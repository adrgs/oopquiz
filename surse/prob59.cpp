#include <iostream>
using namespace std;

class B {
    int x;

public:
    B(int v) { v = x; }
    int get_x() { return x; }
};

class D : private B {
    int y;

public:
    D(int v)
        : B(v)
    {
    }
    int get_x() { return x; }
};

int main()
{
    D d(10);
    cout << d.get_x();
}