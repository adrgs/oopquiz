#include <iostream>
using namespace std;
class cls
{
	int x;

public:
	cls(int y) { x = y; }
	friend int operator*(cls a, cls b) { return (a.x * b.x); }
};
int main()
{
	cls m(100), n(15);
	cout << m * n;
	return 0;
}